$(document).ready(function(){

    let fullUrl = window.location.href;
    let splitUrl = fullUrl.split("/");
    let urlApp = splitUrl[0]+"//"+splitUrl[2]+"/";

    $(document).on("click", "#confirm_user", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let id = $(this).attr("value");
        let etat = "Non validé";
        $.ajax({
            url: urlApp+"ajax-simple-user/"+id+"/"+etat,
            type: "get",
            dataType: "json",
            success: function(data)
            {
                let name = data["first_name"]+" "+data["last_name"];
                $('#confirm_label').text(name);
                $('#confirm_users_id').val(id);
            }
        });
    });

    $(document).on("click", "#confirmation_close", function(e){
        e.preventDefault();
        $('#confirm_label').text('');
    });

    $(document).on("click", "#delete_user", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let id = $(this).attr("value");
        let etat = "Non validé";
        $.ajax({
            url: urlApp+"ajax-simple-user/"+id+"/"+etat,
            type: "get",
            dataType: "json",
            success: function(data)
            {
                let name = data["first_name"]+" "+data["last_name"];
                $('#delete_label').text(name);
                $('#delete_users_id').val(id);
            }
        });
    });

    $(document).on("click", "#suppression_close", function(e){
        e.preventDefault();
        $('#delete_label').text('');
    });

    $(document).on("click", "#desactive_users", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let id = $(this).attr("value");
        let etat = "Validé";
        $.ajax({
            url: urlApp+"ajax-simple-user/"+id+"/"+etat,
            type: "get",
            dataType: "json",
            success: function(data)
            {
                let name = data["first_name"]+" "+data["last_name"];
                $('#desactive_label').text(name);
                $('#desactive_users_id').val(id);
            }
        });
    });

    $(document).on("click", "#desactive_close", function(e){
        e.preventDefault();
        $('#desactive_label').text('');
    });

    $(document).on("click", "#infos_client", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let id = $(this).attr("value");
        $.ajax({
            url: urlApp+"ajax-simple-client/"+id,
            type: "get",
            dataType: "json",
            success: function(data)
            {
                if(data['genre'] == "Homme")
                {
                    $('#photo_client').remove();
                    let source_img = urlApp+"images/pic-4.png";
                    let html = "<div id=\"photo_client\"><img src=\""+source_img+"\"></div>";
                    $("#infos_client_img").append(html);
                }
                else
                {
                    $('#photo_client').remove();
                    let source_img = urlApp+"images/pic-2.png";
                    let html = "<div id=\"photo_client\"><img src=\""+source_img+"\"></div>";
                    $("#infos_client_img").append(html);
                }
                let name = data["nom"]+" "+data["prenom"];
                let num1 = "+"+data['code_telephonique1']+data['numero_telephone1'];
                let num2 = "+"+data['code_telephonique2']+data['numero_telephone2'];
                $('#infos_label').text(name);
                $('#cin').text(data['cin']);
                $('#genre').text(data['genre']);
                $('#num1').text(formaterNumeroTelephone(num1));
                $('#num2').text(formaterNumeroTelephone(num2));
                $('#adresse').text(data['adresse']);
            }
        });
    });

    $(document).on("click", "#infos_close", function(e){
        e.preventDefault();
        $('#photo_client').remove();
        $('#infos_label').text("");
        $('#cin').text('');
        $('#genre').text('');
        $('#num1').text('');
        $('#num2').text('');
        $('#adresse').text('');
    });

    $(document).on("click", "#type_tarifs", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let id = $(this).attr("value");
        $.ajax({
            url: urlApp+"ajax-simple-type-tarif/"+id,
            type: "get",
            dataType: "json",
            success: function(data)
            {
                $('#type_tarif_label').text(data["type_tarif"]);
                $('#type_tarifs_id').val(id);
            }
        });
    });

    $(document).on("click", "#type_tarif_close", function(e){
        e.preventDefault();
        $('#type_tarif_label').text('');
    });

    $(document).on("click", "#tarifs", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let id = $(this).attr("value");
        $.ajax({
            url: urlApp+"ajax-simple-tarifs/"+id,
            type: "get",
            dataType: "json",
            success: function(data)
            {
                let lieu = data['lieu_depart']+" - "+data['lieu_arrive'];
                $('#tarif_label').text(lieu);
                $('#tarifs_id').val(id);
            }
        });
    });

    $(document).on("click", "#tarif_close", function(e){
        e.preventDefault();
        $('#tarif_label').text('');
    });  
});