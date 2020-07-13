window.onload = () =>{
    let csrf = document.getElementsByTagName('meta')[0];
    const model = document.getElementById('model');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf.getAttribute('content')
        }
    });
    loadModels = () =>{
        let manufactor = document.getElementById('manufacturer');
        $.ajax({
            url:'getmodels',
            type:'POST',
            data:({id:manufactor.value}),
            success:(res)=>{
                let html = res.map((model)=>{
                    return `<option value="${model.id}">${model.title}</option>`;
                }).join('');
                model.innerHTML = html;
            }
        });
    }
    loadModels();
}
