const getlink = (link) => {
    window.location.href = link;
}

const btn = document.getElementById('btn-copy');

btn.addEventListener("click", () => {
    const textCopy = document.getElementById('text-copy');
    textCopy.select();
    document.execCommand("copy");
    btn.innerHTML = "copied!";
})
