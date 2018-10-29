<template>
    <span>
    <button class="btn btn-outline-danger btn-sm" @click="deleteModel()">
        <i class="fa fa-trash-alt"></i>
        Eliminar
    </button>
    </span>
</template>

<script>
    export default {
        name: "Delete",
        props: ['model', 'id'],
        data(){
            return {
                model: '',
                id: ''
            }
        },
        methods: {
            deleteModel(){
                window.swal({
                    title: '¿Estás seguro de eliminar el registro?',
                    text: "No podrás revertir esta acción!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.value) {
                        swal(
                            'Eliminado!',
                            'El registro ha sido eliminado.',
                            'success'
                        )
                    }
                })

            }
        }

    }
</script>

<style scoped>

</style>