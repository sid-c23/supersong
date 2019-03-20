<template>
	<div>
		<h3>{{song.title}}</h3>
		<p class="lead">by {{song.artist}}</p>
		<img style="padding-bottom: 15px" :src=song.imageUrl alt="">
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
