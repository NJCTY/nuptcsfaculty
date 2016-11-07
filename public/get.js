var app = new Vue({
    el: '#app',
    data: {
        items: ['个人信息','ss'],
        name: '',
        imgSrc: '',
        title: '',
        contents: [],
        content: '',
        address: '',
        email: '',
        mobile: '',
        company: '' 
    },
    methods: {
        showContent: function(e) {
            this.title = this.items[e];
            this.content = contents[e];
        }
    },
})

function ajax() {
	//此处是api
	var info = getTypeId();
    fetch('index.php/Demo/index/get?type='+info[0]+'&id='+info[1]).then(function(data) {
 		return data.json();
    }).then(function(val) {
    	/*对val需要的参数：
		1.导航选项数组items
		2.对应的内容数组contents
		3.照片地址imgSrc
		4.办公地址address
		5.email地址email
		6.移动电话mobile
		7.单位电话company
		8.姓名name
    	*/
    	app.items = val.items;
    	app.contents = val.contents;
    	app.imgSrc = val.imgSrc;
    	app.address = val.address;
    	app.email = val.email;
    	app.mobile = val.mobile;
    	app.company = val.company;
    	app.name = val.name;
    })
}
ajax();