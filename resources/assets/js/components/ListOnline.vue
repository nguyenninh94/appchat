<template>
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th>Status</th>
			</thead>
			<tbody>
				<tr v-for="u in users">
					<td>{{ u.name }}</td>
					<!--<td v-if="u.id === user.id" class="online">Online</td>
					<td v-else>Offline</td>-->

					<!--<td v-for="u1 in user">
						<p v-show="u.id === u1.id" class="online">Online</p>
						<p v-show="u.id !== u1.id">Offline</p>
					</td>-->
					<td v-for="u1 in user">
						<p v-if="u.id === u1.id" class="online">
							Online
						</p> 
						<p v-else>
						    Offline
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		props: ['user'],//user dang dang nhap

		data() {
			return {
				users: [],
			}
		},

        methods: {
        	fetchUsers() {
        		axios.get('/users').then((response) => {
                   this.users = response.data
        		});
        	}
        },

        created() {
        	this.fetchUsers();
        }
	}
</script>

<style>
	.online {
		color: green;
	}
</style>