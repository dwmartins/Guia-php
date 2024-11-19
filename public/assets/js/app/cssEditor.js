$(document).ready(function() {
    const editor = CodeMirror.fromTextArea(document.getElementById('codeEditor'), {
        lineNumbers: true,
        mode: "css",
        theme: "eclipse",
    });

    $(".CodeMirror").css("font-size", "14px");

    $('#cssEditorForm').on('submit', function(e) {
        $('#codeEditor').val(editor.getValue());
    });
});