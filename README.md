# openSWplatform
## Youties : youtube review website

- 김지현 1876097
- 이서정 1876272
- 박지수 1917015   
- 홍진서 1971058


---------------------------



## YOUTEIS

> #### 메인 화면
> > main.php
> > - 메인 화면
> > - 검색창으로 keyword search 가능
> > 
> > search.php
> > - 검색 결과 화면
> > - 상단에 유튜브 채널, 하단에 리뷰 출력
> > - 채널 명 클릭시 youties의 해당 채널 페이지로 이동
> > - 검색 내용에 대한 채널이 없다면 '검색 결과가 없습니다' 출력
> > 
> > add_channel.php
> > - 검색 후, 검색에 대한 데이터가 없을 경우 search.php에서 버튼을 눌러 실행
> > - 채널 직접 추가 가능
> > - 채널명, 채널 사진, 채널 링크, 카테고리 입력 필요
> > 
> > save_add_channel.php
> > - add_channel.php에 입력된 정보 channel DB에 저장
>
>
>
> #### 회원 관리
> > sign_in_up_out/SignIn.php
> > - 로그인 화면
> > - 각 페이지 상단의 'SIGN IN' 눌렀을 때 실행
> >
> > sign_in_up_out/checkSignIn.php
> > - 로그인 시 회원 정보 확인
> >
> > sign_in_up_out/SignUp.php
> > - 회원 가입 화면
> > - 각 페이지 상단의 'SIGN UP' 또는 로그인 화면의 'create new account' 눌렀을 때 실행
> >
> > sign_in_up_out/idcheck
> > - 회원가입 시 아이디 중복 확인
> >
> > sign_in_up_out/memberSave.php
> > - 회원가입 후 등록된 회원 정보 저장
> >
> > sign_in_up_out/SignOut.php
> > - 로그아웃 기능 처리 php
> > - 로그인 후, 각 페이지의 상단의 'SIGN OUT' 눌렀을 때 실행
> >
> > sign_in_up_out/signIn_style.css
> > - 회원 관리와 관련된 php 파일의 css 파일
>
>
>
> #### 채널 소개
> > channel_intro/channel_intro.php
> > - 채널 소개 화면
> > - 검색 결과 화면에서 '채널명' 눌렀을 때 실행
> > 1. 채널 소개 
> >     - 채널 사진, 채널 명, 구독자 수, 영상 개수 출력
> > 2. 통계
> >     - 해당 채널에 작성된 리뷰의 평균 별점
> >     - 해당 채널에 작성된 유해성 개수
> > 3. 리뷰 쓰기
> >     - 사용자가 직접 리뷰 작성 가능
> >     - 리뷰 제목, 리뷰 내용, 추천도(rating, 별점), 태그, 유해성 입력 가능
> >     - 리뷰 제목, 리뷰 내용, 추천도(rating, 별점)는 필수 입력 사항
> >     - 로그인 후 사용 가능한 기능
> > 4. 리뷰 미리 보기
> >     - 추천도 높은 리뷰 2개, 추천도 낮은 리뷰 2개 각각 보여줌
> >     - 추천도가 같을 경우, 최신 리뷰 보여줌
> >     - 리뷰 제목 리뷰 내용, 작성자, 작성 날짜
> >     - '>>' 버튼을 눌러 모든 리뷰 확인 가능
> > 5. 채널 대표 영상
> >
> > channel_intro/save_review.php
> > - 채널에 등록된 리뷰를 DB에 저장하는 새 창 띄움
> >
> > channel_intro/channel_intro_style2.css
> > - channel_intro와 관련된 php파일의 css 파일
>
>
>
> #### 리뷰
> > review/review_def.php
> > - 특정 채널의 리뷰를 최신순으로 정렬해 출력
> > - 리뷰 제목, 리뷰 내용, 선택한 태그, 작성자, 작성 날짜 및 시간
> > - channel.intro.php에서 '>>' 버튼 눌렀을 때 실행
> > - search.php에서 '리뷰'의 채널명 눌렀을 때 실행
> > - review_pos.php 또는 review_neg.php에서 'MOST RECENT' 버튼 눌러 실행
> >
> > review/review_pos.php
> > - 특정 채널의 리뷰를 추천도(별점) 높은 순으로 정렬해 출력
> > - 추천도가 같을 경우, 최신순으로 정렬
> > - review_pos.php 또는 review_neg.php에서 'MOST RECENT' 버튼 눌러 실행
> >
> > review/review_neg.php
> > - 특정 채널의 리뷰를 추천도(별점) 낮은 순으로 정렬해 출력
> > - 추천도가 같을 경우, 최신순으로 정렬
> > - review_pos.php 또는 review_neg.php에서 'MOST RECENT' 버튼 눌러 실행
> >
> > review/review_sytle.css
> > - 리뷰와 관련된 모든 php 파일의 css 파일
>
>
>
> #### 회원 정보 관리
> > my_page/myPage.php
> > - 회원 정보 화면(마이 페이지)
> > - 로그인 후, 상단의 (자신의 이름) 눌러 실행
> > - 개인 정보 확인 및 수정, 내가 작성한 리뷰 확인 및 수정 가능
> > 1. 개인 정보
> >     - 회원명 출력
> >     - 이메일 출력
> >     - 내가 쓴 리뷰 수 출력
> >     - 환경설정 버튼
> > 2. 통계
> >     - 내가 작성한 유해성 통계 확인 가능
> > 3. 리뷰
> >     - 내가 작성한 최신순으로 정렬
> >     - 추천도(별점), 작성 날짜 및 시간, 채널, 태그, 리뷰 제목 및 내용
> >     - 리뷰 삭제 기능
> >
> > my_page/setting.php
> > - 회원가입 시 입력한 이름, 비밀번호 수정하는 새 창 띄움
> >
> > my_page/save_setting.php
> > - 수정된 회원 정보 저장
> >
> > my_page/delete_review.php
> > - myPage.php에서 각 리뷰의 'DEL' 버튼 눌러 실행
> > - 선택된 리뷰 삭제
> >
> > my_page/myPage_style.css
> > - 회원 정보와 관련된 모든 php 파일의 css 파일