<template>
    <alert v-model="showAlert" placement="top-right" duration="4000" type="success" width="400px" dismissable>
      <span class="icon-ok-circled alert-icon-float-left"></span>
      <strong>Status do Pedido Atualizado</strong>
      <p>Pedido Número: {{ pedido_id }} foi atualizado.</p>
    </alert>
</template>

<script>
    import { alert } from 'vue-strap'

    export default {
        components: {
            alert
        },

        props: ['user_id'],

        data() {
            return {
                showAlert: false,
                pedido_id: ''
            }
        },

        mounted() {
            Echo.channel('burguer-tracker')
            .listen('PedidoStatusChanged', (pedido) => {
                if (this.user_id == pedido.user_id) {
                    this.showAlert = true,
                    this.pedido_id = pedido.id
                }
            });
        }
    }
</script>
