<template>
    <li class="nav-item dropdown mr-4">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="notification-count label label-danger" v-if="notifications.length > 0">{{ notifications.length }}</span>
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-notifications" role="menu">
            <li v-for="notification in notifications">
                <a :href="notification.url">
                    <div>
                        <i class="fas fa-exclamation-circle fa-fw"></i> {{ notification.description }}
                        <span class="pull-right text-muted small"><timeago :since="notification.time" :auto-update="60"></timeago></span>
                    </div>
                </a>
                <div class="divider"></div>
            </li>

            <li>
                <div class="text-center see-all-notifications">
                    <a href="notifications.html" v-if="notifications.length > 0">
                        <strong>Veja Todos os Alertas</strong>
                        <i class="fas fa-angle-right"></i>
                    </a>
                    <div v-else>Sem Notificações</div>
                </div>
            </li>

        </ul>
    </li>

</template>

<script>
    import VueTimeago from 'vue-timeago'

    Vue.use(VueTimeago, {
      name: 'Timeago',
      locale: 'en',
      locales: {
        'zh-CN': require('date-fns/locale/zh_cn'),
    ja: require('date-fns/locale/ja')
      }
    })

    export default {


        props: ['user_id'],

        data() {
            return {
                notifications: []
            }
        },

        mounted() {
            console.log('notifications mounted');
            Echo.channel('burguer-tracker')
            .listen('PedidoStatusChanged', (pedido) => {
                if (this.user_id == pedido.user_id) {
                    this.notifications.unshift({
                        description: 'Pedido Número: ' + pedido.id + ' atualizado',
                        url: '/pedidos/' + pedido.id,
                        time: new Date()
                    })
                }
            });
        }
    }
</script>
