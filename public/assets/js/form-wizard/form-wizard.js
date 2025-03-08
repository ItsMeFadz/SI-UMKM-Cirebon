document.addEventListener("DOMContentLoaded", function() {
    console.log("Form wizard script starting");    

    function setCardHeight() {
        console.log("Setting card height");
    }

    // Function to validate the current step
    function validateCurrentStep(step) {
        const stepDiv = document.querySelector(`.step-content:nth-child(${step + 2})`);
        if (!stepDiv) return true;
    
        const inputs = stepDiv.querySelectorAll('input[required]:not([type="checkbox"]), select[required], textarea[required]');
        let isValid = true;
    
        // Validate inputs
        inputs.forEach(input => {
            if (input.type === 'url') {
                input.type = 'text';
                setTimeout(() => {
                    input.type = 'url';
                }, 100);
            }
    
            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
        });
    
        return isValid;
    }

    window.nextStep = function() {
        console.log("nextStep called");
        
        var msform = document.getElementById("msform");
        if (!msform) {
            console.error("msform not found");
            return;
        }
        
        var stepContents = msform.querySelectorAll(".step-content");
        var stepper = document.getElementById("stepper1");
        var backBtn = document.getElementById("backbtn");
        var nextBtn = document.getElementById("nextbtn");
        
        var currentStep = parseInt(msform.getAttribute("data-step") || "0");
        
        // Validate current step before proceeding
        if (!validateCurrentStep(currentStep)) {
            console.log("Validation failed for step", currentStep);
            return;
        }
        
        // Special handling for step 3 (index 2) when moving to step 4 (final step)
        if (currentStep === 2) {
            // Show Sweet Alert confirmation
            Swal.fire({
                title: 'Konfirmasi Pendaftaran',
                text: 'Apakah Anda sudah yakin data yang Anda masukkan benar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Saya Yakin',
                cancelButtonText: 'Kembali',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Fix URL inputs before final submission
                    const urlInputs = document.querySelectorAll('input[type="url"]');
                    urlInputs.forEach(input => {
                        input.type = 'text';
                    });
                    
                    // Move to the success step (step 4)
                    currentStep++;
                    msform.setAttribute("data-step", currentStep.toString());
                    
                    for (var i = 0; i < stepContents.length; i++) {
                        stepContents[i].style.display = i === currentStep ? "flex" : "none";
                    }
                    
                    // Hide the navigation buttons on success step
                    nextBtn.style.display = "none";
                    if (backBtn) backBtn.style.display = "none";
                    
                    // Refresh the success image
                    var successImage = document.querySelector('.successful-form img');
                    if (successImage) {
                        var imageSrc = successImage.getAttribute('src');
                        successImage.setAttribute('src', imageSrc + '?t=' + new Date().getTime());
                    }
                    
                    // Update stepper classes for step 4
                    if (stepper) {
                        var steps = stepper.getElementsByClassName("step");
                        Array.from(steps).forEach((step, index) => {
                            step.classList.remove("editing");
                            if (index === currentStep) {
                                step.classList.add("editing", "active");
                            } else if (index < currentStep) {
                                step.classList.add("done", "active");
                            } else {
                                step.classList.remove("done", "active");
                            }
                        });
                    }
                    
                    // Submit the form after a short delay to show the success animation
                    setTimeout(function() {
                        const form = document.querySelector('#msform form');
                        form.submit();
                    }, 2000);
                }
            });
            return; // Don't proceed with normal next step logic
        }
        
        // Normal step advancement for other steps
        currentStep++;
        
        console.log("Moving to step:", currentStep);
        
        msform.setAttribute("data-step", currentStep.toString());
        if (backBtn) backBtn.disabled = false;
        
        for (var i = 0; i < stepContents.length; i++) {
            stepContents[i].style.display = i === currentStep ? "flex" : "none";
        }
        
        if (stepper) {
            var steps = stepper.getElementsByClassName("step");
            Array.from(steps).forEach((step, index) => {
                step.classList.remove("editing");
                if (index === currentStep) {
                    step.classList.add("editing", "active");
                } else if (index < currentStep) {
                    step.classList.add("done", "active");
                } else {
                    step.classList.remove("done", "active");
                }
            });
    
            // Update the Next button based on current step
            if (nextBtn) {
                if (currentStep === 2) { // When on step 3 (index 2)
                    nextBtn.textContent = "Finish";
                } else {
                    nextBtn.textContent = "Next";
                }
            }
        }
    
        setTimeout(setCardHeight, 100);
    };

    window.backStep = function() {
        console.log("backStep called");
        
        var msform = document.getElementById("msform");
        if (!msform) {
            console.error("msform not found");
            return;
        }
        
        var stepContents = msform.querySelectorAll(".step-content");
        var stepper = document.getElementById("stepper1");
        var nextBtn = document.getElementById("nextbtn");
        var backBtn = document.getElementById("backbtn");

        var currentStep = parseInt(msform.getAttribute("data-step") || "0");
        currentStep--;
        if (currentStep < 0) currentStep = 0;

        console.log("Moving back to step:", currentStep);
        
        msform.setAttribute("data-step", currentStep.toString());

        for (var i = 0; i < stepContents.length; i++) {
            stepContents[i].style.display = i === currentStep ? "flex" : "none";
        }

        if (stepper) {
            var steps = stepper.getElementsByClassName("step");
            Array.from(steps).forEach((step, index) => {
                if (index === currentStep) {
                    step.classList.add("editing", "active");
                    step.classList.remove("done");
                } else if (index < currentStep) {
                    step.classList.add("done", "active");
                    step.classList.remove("editing");
                } else {
                    step.classList.remove("done", "active", "editing");
                }
            });

            if (nextBtn) {
                // Reset button text based on current step
                if (currentStep === 2) {
                    nextBtn.textContent = "Finish";
                } else {
                    nextBtn.textContent = "Next";
                }
                nextBtn.style.display = "inline-block";
            }

            if (backBtn) {
                backBtn.disabled = currentStep === 0;
                backBtn.style.display = "inline-block";
            }
        }

        setTimeout(setCardHeight, 100);
    };

    // Initialize the form
    var msform = document.getElementById("msform");
    if (msform) {
        msform.setAttribute("data-step", "0");
        
        var stepContents = msform.querySelectorAll(".step-content");
        for (var i = 0; i < stepContents.length; i++) {
            stepContents[i].style.display = i === 0 ? "flex" : "none";
        }
        
        var stepper = document.getElementById("stepper1");
        if (stepper) {
            var steps = stepper.getElementsByClassName("step");
            if (steps.length > 0) {
                steps[0].classList.add("editing", "active");
            }
        }

        var backBtn = document.getElementById("backbtn");
        if (backBtn) backBtn.disabled = true;
    }

    // Set up event listeners
    var nextBtn = document.getElementById("nextbtn");
    var backBtn = document.getElementById("backbtn");

    if (nextBtn) {
        // Remove inline onclick attribute if it exists
        if (nextBtn.hasAttribute("onclick")) {
            nextBtn.removeAttribute("onclick");
        }

        // Add clean event listener
        nextBtn.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation(); // Prevent event bubbling
            window.nextStep();
        });
    }

    if (backBtn) {
        // Remove inline onclick attribute if it exists
        if (backBtn.hasAttribute("onclick")) {
            backBtn.removeAttribute("onclick");
        }

        // Add clean event listener
        backBtn.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation(); // Prevent event bubbling
            window.backStep();
        });
    }

    console.log("Form wizard setup complete");
});