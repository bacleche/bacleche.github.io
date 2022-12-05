/* */
$(document).ready(function() {
    $("select[name='selectcode']").each(function(e) {
        var me = $(this);
		var parent = me.parents('[data-id]');
        // alert(parent);
    
    });
});
/* */

$("input[name='phone']").attr('disabled',true);
// Fonction quin permet de generer le code indicatif sur le champs Numero

/* */
function selectValue(a) {
    var me = $(a);
    if (me.val() == "") {
        alert("vous n'avez rien choisi !")
        $("input[name='phone']").attr('disabled',true);
    }
    else{ 
        $("input[name='phone']").attr('disabled',false);
        $("input[name='phone']").attr('value',me.val());
    }
}

/* */