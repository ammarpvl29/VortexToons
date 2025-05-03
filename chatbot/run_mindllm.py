from flask import Flask, request, jsonify
from transformers import AutoTokenizer, AutoModelForCausalLM, TextGenerationPipeline
from app.marvel_api import get_character_info

app = Flask(__name__)

# Load MindLLM-1b3-chat-zh-v2.0 model and tokenizer
print("Loading MindLLM-1b3-chat-zh-v2.0 model...")
model_name = "bit-dny/MindLLM-1b3-chat-zh-v2.0"
tokenizer = AutoTokenizer.from_pretrained(model_name)
model = AutoModelForCausalLM.from_pretrained(model_name)
model.to("cpu")  # Using CPU for inference
generator = TextGenerationPipeline(model=model, tokenizer=tokenizer, device=-1)
tokenizer.model_max_length = 1024
print("Model loaded successfully.")

# Function to generate a chatbot response
def generate_response(prompt):
    # Check if the query is Marvel-specific
    if "Marvel" in prompt or "Spider-Man" in prompt or "Iron Man" in prompt:
        character_name = prompt.split()[-1]  # Simplistic name extraction
        marvel_info = get_character_info(character_name)
        if marvel_info:
            prompt += f"\n\nMarvel Info: {marvel_info}"

    # Generate response using MindLLM
    output = generator(
        prompt,
        max_new_tokens=1024,
        do_sample=True,
        num_beams=4,
        repetition_penalty=0.5,
        no_repeat_ngram_size=5,
        return_full_text=False,
    )
    return output[0]['generated_text']

@app.route('/')
def home():
    return "Welcome to the MindLLM Chatbot API!"
def chat():
    try:
        # Parse the incoming JSON payload
        data = request.json
        prompt = data.get("prompt", "")

        # Generate a response from the model
        response = generate_response(prompt)

        # Return the response as JSON
        return jsonify({"response": response})
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)