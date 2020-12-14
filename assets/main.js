var modalOs = document.getElementById('modalOs')
modalOs.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var modalTitle = modalOs.querySelector('.modal-title')

  var modalBodyInput = modalOs.querySelector('.modal-body input')
})

let buttons = document.querySelectorAll('[data-id]')
for( button of buttons ) {
    button.addEventListener('click', function(event) {
        let id = event.target.getAttribute('id')

        const obj = fetchOs( id )
    })
}

function fetchOs( id ) {
    const data = {
        id_os: id
    }
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    fetch( '../pages/os.php', options )
        .then( res => res.text())
        .then( result => {
            let response = JSON.parse(result)
            cleanModal()
            populateModal( response )
        }
    )
}

function cleanModal() {
    if( document.contains(document.getElementById('badge')) ) {
        document.getElementById('badge').remove()
        document.getElementById('card-body').innerHTML = ""
    }
}

let updateOsButton = document.getElementById('updateOsButton')
const modalCard = document.getElementById('card-body')

function populateModal( data ) {

    
    const labelChild = document.getElementById('modalOsLabel')

    //Adicionar o badge do status da OS
    let badgeColor
    if( data.os.status == "Aberta" ) {
        badgeColor = "bg-success"
    } 
    if ( data.os.status == "Fechada" ) {
        badgeColor = "bg-danger"
    }

    let badge = document.createElement('span')
    badge.setAttribute('class', "badge " + badgeColor )
    badge.setAttribute('id', "badge")
    badge.textContent = data.os.status

    labelChild.after(badge)

    //Adicionar o número da OS junto com o modal
    let osId = modalOs.querySelector('.card-header')

    osId.innerHTML = "Histórico da Os" + " - " + data.os.id

    //Adicionar o horário de criação da OS
    let cardTitle = document.createElement('h6')
    cardTitle.setAttribute( 'class', "card-title" )
    cardTitle.textContent = data.os.creation_time + " - Abertura da OS"

    modalCard.appendChild(cardTitle)

    //Adicionar a descrição da criação da OS
    let cardText = document.createElement('p')
    cardText.setAttribute( 'class', "card-text" )
    cardText.textContent = data.os.creation_user + " - " + data.os.description
    modalCard.appendChild(cardText)
    //Adicionar o HR entre as atualizações
    
    let hr = document.createElement('hr')
    modalCard.appendChild(hr)

    let updates = data.updates
    if ( updates ) {
        for( let i = 0; i < updates.length; i++ ) {
            let updateTitle = document.createElement('h6')
            updateTitle.setAttribute( 'class', "card-title" )
            updateTitle.textContent = updates[i].update_time + " - Atualização da OS"
    
            modalCard.appendChild(updateTitle)
    
            let updateText = document.createElement('p')
            updateText.setAttribute( 'class', "card-text" )
            updateText.textContent = updates[i].update_user + " - " + updates[i].update_content
            modalCard.appendChild(updateText)
    
            //Adicionar o HR entre as atualizações
            let hr = document.createElement('hr')
            modalCard.appendChild(hr)
        }
    }
    //Adicionar o id no botão de atualizar OS
    updateOsButton.setAttribute('data-id_os', data.os.id )
}

function updateOs( event ) {
    id = event.target
    idAttr = event.target.getAttribute('data-id_os')
    let inputSelect = document.createElement('div')
    inputSelect.setAttribute( 'class', "mb-3" )
    inputSelect.innerHTML = 
        `<div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="Aberta">Aberta</option>
                <option value="Fechada">Fechada</option>
            </select>
        </div>`

    modalCard.appendChild(inputSelect)

    let inputText = document.createElement('div')
    inputText.setAttribute( 'class', "mb-3" )
    inputText.innerHTML = 
        `<label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
         <textarea class="form-control" name="update-content" id="exampleFormControlTextarea1" rows="3"></textarea>`
    modalCard.appendChild(inputText)
    
    id.textContent = "Salvar alterações"
    id.setAttribute('onclick', "")
    id.addEventListener('click', event => {
        id_os = event.target.getAttribute('data-id_os')
        
        fetchUpdate( id_os )
    })
}

function fetchUpdate( id ) {
    const url = "../pages/update_os_action.php"
    const data = {
        id_os: id
    }
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }
    fetch( url, options )
    .then( res => res.text() )
    .then( data => console.log(data))
}