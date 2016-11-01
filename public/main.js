var vm = new Vue({
	el: '#app',
	data: {
		check: false,
		items: ['计算机科学与技术系','软件工程系','信息安全系','系统与网络中心','软件教学中心']
	},
	methods: {
		changeShow: function(e) {
			this.check = true;
			console.log(e);
		}
	}
})