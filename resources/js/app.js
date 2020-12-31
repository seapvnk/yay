require('./bootstrap');

window.onload = () => {
    const fileInput = (inputf, image, click, bgimage = false) => {
        const input = document.querySelector(inputf)
        const avatar = document.querySelector(image)
        const clickable = document.querySelector(click)

        if (!input && !avatar && !clickable) {
            return false;
        }
        
        clickable.addEventListener('click', () => {
            input.click()
        })
        
        const loadFile = function(event) {
    
            if (bgimage) {
                console.log(avatar.style.backgroundImage)
                avatar.style.backgroundImage = `url(${URL.createObjectURL(event.target.files[0])})`
            } else {
                avatar.src = URL.createObjectURL(event.target.files[0])
            }
    
            input.onload = function() {
                URL.revokeObjectURL(input.src)
            }
        }
        input.addEventListener('change', loadFile)
    }
    
    fileInput('#inputavatar', '#avatar', '.avatar-container')
    fileInput('#inputcover', '.cover', '.cover', true)
}