<!-- 帳號管理 -->

<legend>帳號管理</legend>
<!-- 用axjx取得內容載入整個畫面 -->
<table>
    <tr>
        <td class="col">帳號</td>
        <td class="col">密碼</td>
        <td class="col">刪除</td>
    </tr>

    <tbody id="users">

    </tbody>
</table>

<div class="ct">
    <button onclick="del()">確定刪除</button>
    <button onclick="$('table input').prop('checked',false)">清空選取</button>
</div>

<h1>會員註冊</h1>
    <div style="color: red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><button onclick="reg()">註冊</button>
                <!-- <button onclick="reset()">清除</button></td>  可以與funtion分開-->
                <button onclick="reset()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>




<script>
    // 從後台抓出咧表

getUsers();

function reset(){
        // console.log('123');
        $("table input").val("")
    }

function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if(user.acc=='' || user.pw=='' || user.pw2=='' || user.email==''){
        alert("不可空白")
    }else if(user.pw!=user.pw2){
        alert("密碼錯誤")
    }else{
        $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
            if(parseInt(res)==1){
                alert("帳號重複")
            }else{
                $.post("./api/reg.php",user,(res)=>{
                    getUsers();
                })
            }
        })
    }
}





function getUsers(){
$.get("./api/users.php",(users)=>{
        $("#users").html(users)
    })
}

function del(){
    // 建立一個陣列物件
    let ids=new Array();
    
    $("table input[type='checkbox']:checked").each((idx,box)=>{
        ids.push($(box).val())
    })
    // $.post("./api/del_user.php",{del:ids},()=>{
    //     $.get("./api/users.php",(users)=>{
    //         $("#users").html(users)
    //     })
    
    $.post("./api/del_user.php",{del:ids},()=>{
        getUser()

    })
}

</script>