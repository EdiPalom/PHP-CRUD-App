let edit = false;

get_data();

let eval = (error,message)=>{

    let resp = true;
    let attr = "danger";

    if(!error){
        resp = false;
        attr = "success";
    }

    $(".result").html(`<p class="alert alert-${attr}"> ${message} </p>`).show();
    $("p.alert").click(()=>{
        $(".result").empty();
    });
    
    return resp;
}

function get_data(){
    $.get('requests_form.php',
          (res)=>{
              let data = JSON.parse(res);
              $("#contacts").empty();
              data.forEach(e => {
                  let row = `<tr><td>${e['name']}</td><td>${e['phone']}</td><td>${e['email']}</td><td><button contact_id=${e['id']} class="btn-edit btn btn-primary mx-2">Edit</button><button contact_id=${e['id']} class="mx-2 btn btn-danger btn-delete" >Delete</button></td></tr>}}}`;

                  $("#contacts").append(row);                
              });
          });
};

$('button[type="submit"]').click(()=>{

    event.preventDefault();
    
    let name = $('#fullname').val();
    let phone = $('#phone').val();
    let email = $('#email').val();

    let regex_name = /^[a-zA-Z]+\s[a-zA-Z]+$/;
    let regex_phone = /^[0-9]+$/;
    let regex_email = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;

    if(eval(name.length < 8,"Name too short") ||
       eval(!regex_name.test(name),"Invalid name") ||
       eval(phone.length < 8, "Phone too short") ||
       eval(!regex_phone.test(phone),"Invalid phone number") ||
       eval(email.length < 8,"Email too short") ||
       eval(!regex_email.test(email),"Invalid email")){

    }else
    {
        let uri = edit ? 'request_edit_contact.php' : 'requests_form.php';
        
        let id = $("#btn_submit").attr('contact_id');
        
        $.post(uri,{name,phone,email,id},(res)=>{
            console.log(res);            
            let data = JSON.parse(res);
            eval(data.error,data.message);
            $('#add_contact').trigger('reset');
            get_data();
        });

        $("#title_form").addClass("bg-white");
        $("#title_form").text("Add Contact");
        edit = false;
    }
 });

$(document).on('click','.btn-delete',(e)=>{

    if(confirm('Please confirm to delete.'))
    {
        let id = $(e.target).attr('contact_id');
        $.post("delete_contact.php",{id},(res)=>{
            eval(true,res,"success");
            get_data();
        });        
    }
});

$(document).on('click','.btn-edit',(e)=>{
    let id = $(e.target).attr('contact_id');
    $("#title_form").addClass("bg-info");
    $("#title_form").text("Edit Contact");

    $.post("request_contact.php",{id},(res)=>{
        let contact = JSON.parse(res);

        $("#fullname").val(contact["name"]);
        $("#phone").val(contact["phone"]);
        $("#email").val(contact["email"]);
        $("#btn_submit").attr('contact_id',contact["id"]);

        edit = true;
    });
});

