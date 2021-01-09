function dropMenu() {
	var bottomNav = document.getElementById("bottomMenuImg");
	var subMenu = document.getElementsByClassName("subMenu");

	bottomNav.style.backgroundImage = 'url("../../images/bottomNavBackground2.png")';

	for(i = 0; i<subMenu.length; i++) {
		subMenu[i].style.display = "block";
	}
	
	
}
function undropMenu() {
	var bottomNav = document.getElementById("bottomMenuImg");
	var subMenu = document.getElementsByClassName("subMenu");

	bottomNav.style.backgroundImage = 'url("../../images/bottomNavBackground.png")';

	for(i = 0; i<subMenu.length; i++) {
		subMenu[i].style.display = "none";
	}
}
function forgotIdPwClickHere(){
   exitPopUp();
   popUpFind();
   
} 
// 로그인 클릭 팝업 띄우기
function popUpLogin() {
	var loginBox = document.getElementById("loginBox");
	var popUpBackground = document.getElementById("popUpBackground");
	loginBox.style.display = "block";
	popUpBackground.style.display = "block";
}
function exitPopUp() {
	var loginPopUp_cancelButton = document.getElementById("loginPopUp_cancelButton");
	var signUpBox = document.getElementById("signUpBox");
	
	loginBox.style.display = "none";
	signUpBox.style.display = "none";
	popUpBackground.style.display = "none";
}
function popUpFind() {
	var findIdPwBaseBox = document.getElementById("findIdPwBaseBox");
	var popUpBackground = document.getElementById("popUpBackground");
	findIdPwBaseBox.style.display = "block";
	popUpBackground.style.display = "block";
}

function popUpSignUp() {
	var signUpBox = document.getElementById("signUpBox");
	var popUpBackground = document.getElementById("popUpBackground");
	signUpBox.style.display = "block";
	popUpBackground.style.display = "block";
}

//----------------------------------------------------------------------------
// 본 페이지 함수

// 빈 조회페이지 이동
function goOrderFinderEmpty() {
	location.href="../../html/mypage/orderFinderEmpty.html";
}

// 상세 주문 조회 이동
function goOrderFinderDetail() {
	location.href="../../html/mypage/orderFinderDetail.html";
}