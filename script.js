const token = "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";
const inputTxt = document.getElementById("input");
const image = document.getElementById("Image"); // Ensure ID matches
const button = document.getElementById("btn");

async function query() {
    image.src = "/loading.gif"
    try {
        const response = await fetch(
            "https://api-inference.huggingface.co/models/Melonie/text_to_image_finetuned",
            {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({ "inputs": inputTxt.value })
            }
        );

        if (!response.ok) {
            const errorDetails = await response.text();
            throw new Error(`Request failed: ${response.status} - ${response.statusText} - ${errorDetails}`);
        }

        const result = await response.blob();
        return result;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Re-throw the error to be caught by the event listener
    }
}

button.addEventListener('click', async function () {
    try {
        const response = await query();
        const objectURL = URL.createObjectURL(response);
        image.src = objectURL;
    } catch (error) {
        console.error('Error:', error);
    }
});
