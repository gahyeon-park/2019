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

function forgotIdPwClickHere(){
   exitPopUp();
   popUpFind();
   
}

// ------------------------------------------------------------
// 본 페이지 함수
 
// 주문하기 이동
function goShoppingCartOrder(){
	location.href="../../html/mypage/shoppingCartOrder.html";
}

// 체크박스 함수

// 전체 선택 시 모든 상품 선택
function changeCheckBox() {
	var checkBox = document.getElementsByClassName("orderDetailCheckBox");

	
	if(checkBox[0].checked == true) {
		for(i = 0; i < checkBox.length; i++) {
			checkBox[i].checked = true;
		}
	}
	else {
		for(i = 0; i < checkBox.length; i++) {
			checkBox[i].checked = false;
		}
	}

}

// 전체 선택이 되어있을 때 상품 선택 안할 때 전체선택 풀기
// 전체 선택이 풀어져 있고 모든 상품이 선택되어졌을 때 전체 선택 체크
function changeProductCheckBox() {
	var allCheckBox = document.getElementById("allCheckBox");
	var productCheckBox = document.getElementsByClassName("orderDetailCheckBox");
	var countCheck = 1;

	for(i = 1; i < productCheckBox.length; i++) {
		if(productCheckBox[i].checked == false) {
			allCheckBox.checked = false;
		}
		else countCheck++;
	}
	if(countCheck == productCheckBox.length) allCheckBox.checked = true;
}

function changePrice() {
	var productsPrice = document.getElementsByClassName("productPrice"); // 상품 가격들 배열
	var checkBox = document.getElementsByClassName("orderDetailCheckBox");	// 체크박스들 (1부터 상품들)
	var productList = document.getElementsByClassName("orderDetailMenu");	// display none 확인해야함

	var productTotalPrice = document.getElementById("productTotalPrice");	// 상품 총 가격
	var delieverPrice = document.getElementById("delieverPrice");		// 배송비
	var totalPrice = document.getElementById("totalPrice");		// 전체 가격

	var checkProductArr = [];	// 체크된 상품들 가격 배열
	var productTotalPriceNum = 0;	// 체크된 상품들 총 가격

	for(i = 0; i < productsPrice.length; i++) {
		if(checkBox[i+1].checked == true && productList[i].style.display != "none") {
			checkProductArr.push(stringToNum(productsPrice[i].innerHTML));
		}
	}

	// 상품 총 합과 배송비 합금액 구하기
	for(i = 0; i < checkProductArr.length; i++) {
		productTotalPriceNum += checkProductArr[i];
	}
	totalPriceNum = productTotalPriceNum + stringToNum(delieverPrice.innerHTML);


	// 상품 총합 가격 띄우기
	productTotalPrice.innerHTML = productTotalPriceNum;
	var temp = document.getElementById("productTotalPrice").innerHTML;
	productTotalPrice.innerHTML = insertComma(temp) + "원";

	// 배송비 합한 총합 가격 띄우기
	totalPrice.innerHTML = totalPriceNum;
	var temp = document.getElementById("totalPrice").innerHTML;
	totalPrice.innerHTML = insertComma(temp) + "원";
}

	// 문자열을 숫자로
	function stringToNum(myString) {
		var myStringArr = [];
		var cipher = 1;

		var resultNum = 0;

		for(var i = 0; i < myString.length; i++){
			if(myString[i] != "," && myString[i] != "원"){
				myStringArr.unshift(parseInt(myString[i]));
			}
		}

		for(var i = 0; i < myStringArr.length; i++){
			resultNum += parseInt(myStringArr[i]) * cipher;
			cipher *= 10;
		}
		return resultNum;
	}
	
	
	// 문자열에 콤마찍기
	function insertComma(myString) {
		var stringLength = myString.length;
		var resultTemp = [];
		var result = [];
		var resultString = "";

		for(i = 0; i < stringLength; i++){
			resultTemp.unshift(myString[i]);
		}
		
		for(i = stringLength-1; i >= 0; i--){
				
			result.push(resultTemp[i]);
			if(i % 3 == 0 && i != 0) {
				result.push(",");
			}
				
		}
		for(i = 0; i < result.length; i++){
			resultString += result[i];
				
		}
		return resultString;
	}	



// 선택상품삭제 버튼 클릭
function deleteSelect() {
	var productList = document.getElementsByClassName("orderDetailMenu");	// 상품 리스트
	var checkBox = document.getElementsByClassName("orderDetailCheckBox");	// 상품 체크박스(1부터 시작)

	var selectProductArr = [];

	var countNum = 0;	// 모두 삭제되었는지 확인

	for(i = 0; i < productList.length; i++) {
		if(checkBox[i + 1].checked == true) {
			selectProductArr.push(productList[i]);
			checkBox[i + 1].checked = false;
		}
	}

	for(i = 0; i < selectProductArr.length; i++) {
		selectProductArr[i].style.display = "none";
	}
	
	for(i = 0; i < checkBox.length; i++) {
		checkBox[i].checked = true;
	}

	// 전체 삭제 되었을 시 문구 출력
	for(i = 0; i < productList.length; i++) {
		if(productList[i].style.display == "none") countNum++;
	}
	if(productList.length == countNum) printAllDelete();

	// 값 바꾸기
	changePrice();
}

// 전체상품삭제 버튼 클릭
function deleteAll() {
	var productList = document.getElementsByClassName("orderDetailMenu");	// 상품 리스트
	var checkBox = document.getElementsByClassName("orderDetailCheckBox");	// 상품 체크박스(1부터 시작)

	for(i = 0; i < productList.length; i++) {
		productList[i].style.display = "none";
		checkBox[i + 1].checked = false;

	}

	for(i = 0; i < checkBox.length; i++) {
		checkBox[i].checked = true;
	}
	
	printAllDelete();
	changePrice();
}

function printAllDelete() {
	var noProduct = document.getElementsByClassName("noOrderDetailMenu");
	var delieverPrice = document.getElementById("delieverPrice");

	delieverPrice.innerHTML = "0원";
	for(i = 0; i < noProduct.length; i++) {
		noProduct[i].style.display = "inline-block";
	}	
}

















