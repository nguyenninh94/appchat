<template>
	<div class="online">
		<list-online v-for="u1 in user" :u1="u1"></list-online>
	</div>
</template>

<script>
	export default {
		props: ['user']
	}
</script>