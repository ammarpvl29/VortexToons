import hashlib
import time
import requests
import os
from dotenv import load_dotenv

# Load environment variables from .env file
load_dotenv()

# Marvel API credentials from environment variables
PUBLIC_KEY = os.getenv("PUBLIC_KEY")
PRIVATE_KEY = os.getenv("PRIVATE_KEY")

# Marvel API base URL
BASE_URL = "https://gateway.marvel.com/v1/public"

# Generate Marvel API authentication parameters
def generate_marvel_auth():
    ts = str(int(time.time()))  # Current timestamp
    hash_string = ts + PRIVATE_KEY + PUBLIC_KEY
    hash_md5 = hashlib.md5(hash_string.encode()).hexdigest()
    return ts, hash_md5

# Fetch information about a specific Marvel character
def get_character_info(character_name):
    ts, hash_md5 = generate_marvel_auth()
    params = {
        "name": character_name,
        "ts": ts,
        "apikey": PUBLIC_KEY,
        "hash": hash_md5
    }
    response = requests.get(f"{BASE_URL}/characters", params=params)

    # Handle response
    if response.status_code == 200:
        results = response.json().get("data", {}).get("results", [])
        if results:
            return results[0].get("description", "No description available.")
    else:
        return f"Error: {response.status_code} - {response.text}"