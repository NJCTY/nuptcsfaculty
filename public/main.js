var vm = new Vue({
	el: '#app',
	data: {
		check: false,
		items: ['计算机科学与技术系','软件工程系','信息安全系','系统与网络中心','软件教学中心'],
		type: '',
		id: '',
		names: []
	},
	methods: {
		changeShow: function(e) {
			this.check = true;
			this.getData(e)
		},
		getData: function(e) {
			fetch("index.php?type="+e).then(function(val) {
				return val.json();
			}).then(function(val) {
				//val就是返回的数组,数组的成员是对象对象中的值是name pinyin type id
				vm.names = val;
				vm.type = val[e].type;
				vm.id = val[e].id;
			})
		}
	}
})