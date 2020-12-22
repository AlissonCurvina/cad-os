import addElement from "./addElement.js"

var modalOs = document.getElementById('modalOs')
modalOs.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var modalTitle = modalOs.querySelector('.modal-title')

  var modalBodyInput = modalOs.querySelector('.modal-body input')
})

let buttons = document.querySelectorAll('[data-id]')
for( let button of buttons ) {
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
    let badge = document.getElementById('badge')
    let cardBody = document.getElementById('card-body')

    if( document.contains(badge) ) {
        badge.remove()
        cardBody.innerHTML = ""
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
    var attributes = {
        class: "badge " + badgeColor,
        id: "badge"
    }
    var content = data.os.status
    var badge = addElement("span", attributes, content)

    labelChild.after(badge)

    //Adicionar o número da OS junto com o modal
    let osId = modalOs.querySelector('.card-header')
    const osType = function() {
        if( data.os.type == "Instalao" || data.os.type == "Instalação" ) {
            return "Instalação"
        } else {
            return data.os.type
        }
    }
    osId.innerHTML = "Histórico da Os" + " - " + data.os.id + " - " + osType()

    //Adicionar o horário de criação da OS
    var attributes = {
        class: "card-title"
    }
    var content = data.os.creation_time + " - Abertura da OS"
    let cardTitle = addElement("h6", attributes, content )

    modalCard.appendChild(cardTitle)

    //Adicionar a descrição da criação da OS
    var attributes = {
        class: "card-text"
    }
    var content = data.os.creation_user + " - " + data.os.description
    let cardText = addElement('p', attributes, content )
    modalCard.appendChild(cardText)
    //Adicionar o HR entre as atualizações
    
    let hr = document.createElement('hr')
    modalCard.appendChild(hr)

    let updates = data.updates
    if ( updates ) {
        for( let i = 0; i < updates.length; i++ ) {
            var attributes = {
                class: "card-title"
            }
            var content = updates[i].update_time + " - Atualização da OS"
            let updateTitle = addElement('h6', attributes, content )
    
            modalCard.appendChild(updateTitle)
    
            var attributes = {
                class: "card-text"
            }
            var content = updates[i].update_user + " - " + updates[i].update_content
            let updateText = addElement('p', attributes, content )
            modalCard.appendChild(updateText)
    
            //Adicionar o HR entre as atualizações
            let hr = addElement('hr')
            modalCard.appendChild(hr)
        }
    }
    //Adicionar o id no botão de atualizar OS
    if( data.os.status == "Fechada") {
        updateOsButton.setAttribute("disabled", true);
    } else {
        updateOsButton.setAttribute('data-id_os', data.os.id )
        updateOsButton.setAttribute('href', "update_os.php?id=" + data.os.id )
    }
    
    
}