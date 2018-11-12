<template>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-bell"></i>

            <span class="badge badge-warning navbar-badge" v-if="notifications.length" v-text="notifications.length"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right animated fadeIn" v-if="notifications.length">
            <a @click="markAllAsRead" class="dropdown-item dropdown-footer" style="cursor: pointer;">Marcar todo como leído</a>
            <div class="dropdown-divider"></div>


            <a @click="markAsRead(notification)" :href="notification.data.link" class="dropdown-item" v-for="notification in notifications">
                <div class="row">
                    <div class="col-md-12">
                        {{ notification.data.text | readMore(30, '...')  }}
                    </div>
                </div>

                <span class="float-right text-muted text-sm">{{ notification.data.fecha['date']}}</span>
            </a>

            <div class="dropdown-divider"></div>
            <a href="/notificaciones" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['userid'],
        data(){
          return{
              notifications: []
          }
        },
        methods: {
            markAsRead(notificacion){
                axios.put('/notificaciones/'+ notificacion.id)
                    .then(response => {
                        this.notifications = response.data;
                    })
                    .catch(error => console.log(error));
            },
            markAllAsRead(){
                axios.post('notificaciones/')
                    .then(response => {
                        this.notifications = response.data;
                    })
                    .catch(error => console.log(error));
            }
        },
        filters: {
            readMore(text, length, suffix){
                return text.substring(0, length) + suffix;
            }
        },
        created() {
            axios.get('notificaciones/').then(response => {
                this.notifications = response.data;
            }).catch(error => console.log(error));

            Echo.private(`App.User.${this.userid}`)
            .notification((notification) => {
                console.log(notification);
            });
        }
    }
</script>
