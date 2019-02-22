<template>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3 col-sm-12 text-center"><one-song :songWin="this.song1Win" :song="this.song1" v-if="song1"></one-song> <p class="lead" v-else>Loading...</p></div>
		<div class="col-md-3 col-sm-12 text-center"><one-song :songWin="this.song2Win" :song="this.song2" v-if="song2"></one-song><p class="lead" v-else>Loading...</p></div>
		<div class="col-md-3"></div>
	</div>
</template>

<script>
import axios from 'axios'
/*
 lose : 0 points
 win : 1 point
*/

export default {
	mounted() {
		this.newGame()
	},
	data() {
		return {
			song1: null,
			song2: null,
			exp1: 0,
			exp2: 0,
			canPlay: false
		}
	},
	methods: {
		newGame() {
			axios.get('/getSongs')
				.then( res => {
					this.song1 = res.data.song1
					this.song2 = res.data.song2
					this.calculateExpected()
				})
		},
		calculateExpected() {
			let elo1 = this.song1.elo
			let elo2 = this.song2.elo
			let q1 = Math.pow(10, elo1 / 400)
			let q2 = Math.pow(10, elo2 / 400)
			this.exp1 = q1 / (q1 + q2)
			this.exp2 = q2 / (q2 + q1)
			this.canPlay = true
		},
		async song1Win() {
			let actual1 = 1
			let newElo1 = this.song1.elo + 32 * (actual1 - this.exp1)
			let actual2 = 0
			let newElo2 = this.song2.elo + 32 * (actual2 - this.exp2)
			let test = await axios.post('/updateElo', {
				id: this.song1.id,
				elo: newElo1
			})
			await axios.post('/updateElo', {
				id: this.song2.id,
				elo: newElo2
			})
			this.newGame()
		},
		async song2Win() {
			let actual1 = 0
			let newElo1 = this.song1.elo + 32 * (actual1 - this.exp1)
			let actual2 = 1
			let newElo2 = this.song2.elo + 32 * (actual2 - this.exp2)
			await axios.post('/updateElo', {
				id: this.song1.id,
				elo:newElo1
			})
			await axios.post('/updateElo', {
				id: this.song2.id,
				elo: newElo2
			})
			this.newGame()
		}
	}
}
</script>

<style>

</style>
