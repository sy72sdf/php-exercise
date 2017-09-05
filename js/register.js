//获取对象
function $(elementID){
	return document.getElementById(elementID);
};
//用户名验证
function username(){
	var username = $('username');
	var reg=/^[a-zA-Z]\w{5,11}$/
	if (username.value == "") {
		//alert("用户名不能为空！");
		return false;
	};
	if (reg.test(username.value)==false) {
		alert("请按规范填写密码！");
		return false;
	};
	return true;
};
//密码验证
function password(){
	var password = $('password');
	if (password.value == "") {
		//alert("密码不能为空！");
		return false
	};
	if (password.value.length<6 ||password.value.length>16) {
		alert("密码长度不符合要求!");
		return false;
	};
	return true;
};
//再次输入密码
function repassword(){
	var repassword = $('password2');
	if (repassword.value == "") {
		//alert("请在输入一次密码！");
		return false;
	};
	if (repassword.value != $('password').value) {
		alert("两次输入密码必须一致！");
		return false;
	};
	return true;
};
//邮箱验证
function email(){
	var email = $('email');
	var emailreg = /^\w+\@\w+\.\w+$/;
	if (email.value =="") {
		//alert("请输入邮箱！");
		return false;
	};
	if (emailreg.test(email.value)==false) {
		alert("请输入正确格式邮箱！");
		return false;
	};
	return true;
};
//手机号验证
function tel(){
	var tel = $('tel');
	var telreg = /^1[3|4|5|6|7|8][0-9][0-9]{8}$/;
	if (tel.value =="") {
		//alert("请输入手机号！");
		return false;
	};
	if (telreg.test(tel.value)==false) {
		alert("请输入正确的手机号！");
		return false;
	};
	return true;
};
//地区验证
function select(){
	var noarea = $('noselect');
	if (noarea.selected == true) {
		//alert("请选择省份！");
		return false;
	};
	return true
};
//表单提交时验证
function check(){
	var usernamecheck = username();
	var passwordcheck = password();
	var repasswordcheck = repassword();
	var emailcheck = email();
	var telcheck = tel();
	var selectedcheck = select();
	var agreement = $('agreement');
	
	if(usernamecheck==true&&passwordcheck==true&&repasswordcheck==true&&emailcheck==true&&telcheck==true&&selectedcheck==true&&agreement.checked==true) {
		return true;
	}else{
		//alert("请按要求完成各项并接受用户协议！");
		//return false;
	};
};
//执行验证
   $('form').onsubmit = function(){
   	check();
     	 if(check()==true){
     	 	return true;
     	 }else{
     	 	return false;
     	 }
   };