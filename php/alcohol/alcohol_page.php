<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if (isset($_GET['acId'])) {
        $acId = $_GET['acId'];
    } else {
        $memberId = 0;
    }

    //술 정보 가져오기
    $acSql = "SELECT * FROM drinkList WHERE acId = '$acId'";
    $acResult = $connect->query($acSql);
    $acInfo = $acResult->fetch_array(MYSQLI_ASSOC);

    // 조회수 추가
    $updateViewSql = "UPDATE drinkList SET acView = acView + 1 WHERE acId = '$acId'";
    $connect->query($updateViewSql);

    // 추천수 추가
    $updateLikeSql = "UPDATE drinkList SET acLike = acLike + 1 WHERE acId = '$acId'";
    $connect->query($updateLikeSql);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>취중진담</title>

    <!-- meta -->
    <meta name="author" content="취중진담">
    <meta name="description" content="프론트엔드 개발자 포트폴리오 조별과제 사이트입니다.">
    <meta name="keywords" content="웹퍼블리셔,프론트엔드, php, 포트폴리오, 커뮤니티, 술, publisher, css3, html, markup, design">

    <!-- favicon -->
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">

    <!-- fontasome -->
    <script src="https://kit.fontawesome.com/2cf6c5f82a.js" crossorigin="anonymous"></script>

    <!-- swiper / 술 랭킹-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- css -->
    <link href="../assets/css/reset.css" rel="stylesheet" />
    <link href="../assets/css/fonts.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/common.css" rel="stylesheet" />
    <link href="../assets/css/alcohol.css" rel="stylesheet" />

    <!-- js -->
    <script src="../assets/js/scrollEvent.js"></script>
</head>

<body>
    <div id="wrapper">
        <!-- PC HEADER 840 < window -->
        <?php include "../include/header.php"; ?>

        <!-- M HEADER 840 > window -->
        <?php include "../include/logo.php"; ?>

        <?php include "../include/headerbottom.php"; ?>
        <!-- header end -->

        <main id="contents_area">
            <section id="main_contents">


                <div class="alcohol_info boxStyle roundCorner shaDow">
                    <div class="alcohol_thumbnail"></div>

                    <div class="alcohol_desc">
                        <div class="alcohol_img">
                            <img src="<?= $acInfo['acImgPath'] ?>" alt="<?= $acInfo['acName'] ?>">
                        </div>
                        <div class="alcohol_detail">
                            <h4><?= $acInfo['acName'] ?></h4>
                            <p><?= $acInfo['acCompany'] ?></p>
                            <em class="scrollStyle">
                                <?= $acInfo['acDesc'] ?>
                            </em>
                            <button id="acLikeBtn" class="good_btn">
                                <i class="fa-regular fa-thumbs-up"></i> 추천합니다.
                            </button>
                        </div>
                    </div>

                </div>
                <div class="item_summary alcohol_summary boxStyle roundCorner shaDow">
                    <ul>
                        <li class="summary_good">
                            <p><i class="fa-regular fa-thumbs-up"></i> 추천수</p><span><?= $acInfo['acLike'] ?></span>
                        </li>
                        <li class="summary_comment">
                            <p><i class="fa-solid fa-comment"></i>후기</p><span><?= $acInfo['acComment'] ?></span>
                        </li>
                        <li class="summary_abv">
                        <p><i class="fa-solid fa-wine-glass"></i>도수</p><span><?= $acInfo['acAbv'] ?></span>
                        </li>
                    </ul>
                </div>

                <!-- 작성된 후기 없음 -->
                <!-- <div class="alcohol_review boxStyle roundCorner shaDow">
                    <h4>후기 <span>0</span></h4>
                    <ul class="review_wrap">
                        <li>
                            <div class="review_text">
                                <span>아직 작성 된 후기가 없습니다.</span>                                
                            </div>
                        </li>
                    </ul>
                </div> -->

                <div class="alcohol_review boxStyle roundCorner shaDow">
                    <h4>후기 <span><?= $acInfo['acComment'] ?></span></h4>
                    <ul class="review_wrap">
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">닉네임닉네임닉네임닉네임</strong>
                                <p>술 땡기는 금요일~ 곱창에 소주 땡기네요.땡기는 금요일~ 곱창에 소주 땡기네요.땡기는 금요일~ 곱창에 소주 땡기네요.땡기는 금요일~ 곱창에 소주
                                    땡기네요.땡기는 금요일~ 곱창에 소주 땡기네요.땡기는 금요일~ 곱창에 소주 땡기네요.땡기는 금요일~ 곱창에 소주 땡기네요.</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">술자리주인공</strong>
                                <p>자주 마셔요. 가성비도 굿</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">위스키전문가</strong>
                                <p>입문자에게 추천하는 위스키~</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">술자리주인공</strong>
                                <p>자주 마셔요. 가성비도 굿</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">위스키전문가</strong>
                                <p>입문자에게 추천하는 위스키~</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">위스키전문가</strong>
                                <p>입문자에게 추천하는 위스키~</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">술자리주인공</strong>
                                <p>자주 마셔요. 가성비도 굿</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">위스키전문가</strong>
                                <p>입문자에게 추천하는 위스키~</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">위스키전문가</strong>
                                <p>입문자에게 추천하는 위스키~</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛인데 왜 아무도 안먹죠? 피자랑 먹으면 개꿀맛인데 왜 아무도 안먹죠? 피자랑 먹으면 개꿀맛인데 왜 아무도 안먹죠?피자랑 먹으면
                                    개꿀맛인데 왜 아무도 안먹죠?</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">술자리주인공</strong>
                                <p>자주 마셔요. 가성비도 굿</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">위스키전문가</strong>
                                <p>입문자에게 추천하는 위스키~</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                        <li>
                            <div class="review_text">
                                <strong class="textCut">안주킬러</strong>
                                <p>피자랑 먹으면 개꿀맛</p>
                                <a href="#" class="modify">수정</a>
                                <a href="#" class="delete">삭제</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="boxStyle roundCorner shaDow">
                    <h4>후기 작성하기</h4>
                    <div class="review_add">
                        <textarea class="scrollStyle" name="review_write" id="review_write"
                            placeholder="내 입맛에 어땠는지 의견을 나눠요."></textarea>
                        <button>작성하기</button>
                    </div>
                </div>

            </section>
            <!-- main_contents end -->

            <?php include "../include/sidewrap.php"; ?>
            <!-- side_box end -->

        </main>
        <!-- contents_area end -->
    </div>
    <!-- wrapper end -->

    <script>
        // 버튼 클릭 시 이벤트 처리
        document.getElementById('acLikeBtn').addEventListener('click', function() {
            
            alert("이 술을 추천했습니다.");

            let acId = this.getAttribute('data-acid');
            
            // AJAX 요청을 통해 서버에 추천수를 업데이트하는 PHP 스크립트 호출
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'acLikeUpdate.php?acId=' + acId, true);
            xhr.send();
            
            // 서버에서 응답을 받지 않고 버튼을 여러 번 클릭하는 것을 방지하려면 버튼을 비활성화할 수 있습니다.
            this.disabled = false;
        });
    </script>
</body>

</html>