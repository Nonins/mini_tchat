setInterval(() => 
{
    $.ajax(
        {
            url: '../intercepteur.php',
            type : 'POST',
            dataType : 'html',
            data:'status=on',
            success : function(code_html)
            {
                var label = document.getElementById("label")
                label.innerHTML=code_html;
            }
            }
    ); 
}, 8000);
document.addEventListener('DOMContentLoaded', function() {
    document.getElementsByName('form1')[0].addEventListener('submit', (e) => {
        e.preventDefault();

        let form = e.target;
        let content = String(form.mess.value);
        $.ajax(
            {
                url: '../intercepteur.php',
                type : 'POST',
                data: JSON.stringify(
                    {
                        message: content
                    }
                ),
                dataType : 'html',
                success : function(code_html)
                {
                    var label = document.getElementById("label")
                    label.innerHTML=code_html;
                    document.form1.mess.value = '';
                }
                }
        );
        })
    });
