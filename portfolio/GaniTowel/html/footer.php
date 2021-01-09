<!-- 나의 장바구니 -->
<footer id='myCartBox' class='footerBox'>
                <!-- 나의 장바구니 스위치 부분 -->
                <header class="myCartHeader">
                    <i id='myCartSwitchButton' class='xi-angle-up xi-4x myCartHeaderIcon'></i> <!-- xi-angle-down -->
                    <p class='myCartHeaderTitle'>나의 장바구니&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </header>

                <!-- 나의 장바구니 인풋 창 -->
                <div class="inputCartBox">

                    <div class='myCartForm'>
                        <div class='form-group'>
                            <!-- 상품 선택 인풋창 -->
                            <select id="productNameInput" class='form-control selectInput' name="productName" id="productName">
                                <option id="productNameInputNone" value="0">상품명 선택</option>
                                <option value="washTowel">가니 세면타월</option>
                                <option value="beachTowel">가니 비치타월</option>
                                <option value="handTowel">가니 손수건</option>
                            </select>
                            <!-- 중량 선택 인풋창 -->
                            <select id="weightInputBox" class='form-control selectInput' name="productWeight" id="productWeight">
                                <option id="productWeightInputNone" value="0">중량 선택</option>
                                <option value="150">150g</option>
                                <option value="170">170g</option>
                                <option value="200">200g</option>
                            </select>                    
                            <!-- 단품, 세트 선택 라디오 버튼 -->
                            <div class="btn-group radioInputBox" data-toggle="buttons">
                                <label class="btn radioInput active">
                                    <input type="radio" name="productType" value="num" id="numRadio" autocomplete="off" checked>&nbsp;&nbsp;단품
                                </label>
                                <label class="btn radioInput">
                                    <input type="radio" name="productType" value="set" id="setRadio" autocomplete="off">&nbsp;&nbsp;세트
                                </label>
                            </div>
                            <input id="productNumInput" class='numberInput' type="number" name='productNum' value='1' min='1' max='10' placeholder='1'>
                            <!-- 색상 선택 버튼 -->
                            <input type="hidden" name='productColor'>
                            <div id="productColorBox">

                            </div>

                            <!-- 장바구니 추가 버튼 -->
                            <button id="myCartPlusButton" class='plusButton'><i class='xi-plus-square-o xi-3x'></i></button>
                        </div>
                    </div>
                </div>

                <!-- 장바구니 목록 -->
                <div class='myCartListBox'>
                    <!-- 장바구니 목록 하나 -->
                    <ol id="myCartList" class='myCartList'>
                        
                    </ol>

                    <!-- 총 금액 -->
                    <div class='myCartTotalPriceBox'>
                        <p class='myCartTotalPriceText'>총 금액</p>
                        <p id="myCartTotalPrice" class='myCartTotalPrice'>0원</p>
                    </div>
                    <!-- 구매하기 --> 
                    <div class="allDeleteBox">
                        <button class="allDeleteButton" data-toggle="modal" data-target="#allDeleteModal">전체삭제</button>
                    </div>
                    <div class="purchaseBox">
                        <button class="purchaseButton" data-toggle="modal" data-target="#purchaseModal">구매하기</button>
                    </div>
                </div>
            </footer>

<!-- =============================== 모달 창 ================================ -->

            <!-- 옵션 선택 부탁 -->
            <div id="moreOptionModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">    
                            옵션을 선택해 주세요.
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">닫기</button>
                        </div>
        
                    </div>
                </div>
            </div>

    
            <!-- 나의 장바구니 + 버튼 모달 -->
            <div id="myCartAddModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">    
                            장바구니에 추가되었습니다!
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">닫기</button>
                        </div>
        
                    </div>
                </div>
            </div>


            <!-- 나의 장바구니 x 버튼 모달 -->
            <div id="myCartDeleteModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">    
                            정말 장바구니에서 삭제하시겠습니까?
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button id="myCartDeleteButton" type="button" class="btn btn-primary myCartDeleteButton" data-dismiss="modal">네</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">아니요</button>
                        </div>
        
                    </div>
                </div>
            </div>

            <!-- 나의 장바구니 x 버튼 모달 -->
            <div id="allDeleteModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">    
                            정말 모두 장바구니에서 삭제하시겠습니까?
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button id="myCartAllDeleteButton" type="button" class="btn btn-primary myCartDeleteButton" data-dismiss="modal">네</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">아니요</button>
                        </div>
        
                    </div>
                </div>
            </div>

            <!-- 구매하기 버튼 -->
            <div id="purchaseModal" class="modal fade purchaseModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">
                        이 포트폴리오는 장바구니 구현에 초첨을 맞춰서 구매하기는 미구현입니다.
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">닫기</button>
                        </div>
        
                    </div>
                </div>
            </div>