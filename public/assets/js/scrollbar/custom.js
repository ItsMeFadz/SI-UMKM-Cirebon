(function() {
    var myElement = document.getElementById("simple-bar");
    new SimpleBar(myElement, {
        autoHide: true
    });
})();

document.addEventListener("DOMContentLoaded", function () {
    const hargaInput = document.getElementById("harga");

    hargaInput.addEventListener("input", function (e) {
        let value = this.value.replace(/[^0-9]/g, ""); // Hanya angka
        if (value) {
            this.value = new Intl.NumberFormat("id-ID").format(value); // Format ribuan
        }
    });
});
