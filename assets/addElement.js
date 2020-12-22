export default function addElement( element, attributes, content ) {
    let createdEl = document.createElement(element)    
    for( let attribute in attributes ) {
        createdEl.setAttribute( attribute, attributes[attribute])
    }
    createdEl.innerHTML = content
    return createdEl
}