const file = document.querySelector(".file")
const image = document.getElementById("image-profile")

file.addEventListener("change", function () {
    const file = this.files[0]
    try {
        const reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = (event) => {
            image.src = event.target.result
        }
    } catch (error) {
        console.log(error)
    }
})
