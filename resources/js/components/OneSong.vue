<template>
	<div>
		<h3>{{song.title}}</h3>
		<p class="lead">by {{song.artist}}</p>
		<h6>{{song.imageUrl}}</h6>
		<button class="btn btn-success" @click="songWin">Choose</button>
	</div>
</template>

<script>
export default {
	props: ["song", "songWin"]
}
</script>

<style>

</style>
