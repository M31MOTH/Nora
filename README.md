# TayTay
A web based chatbot for a capture the flag event based on Javascript manipulation created for the May 2017 Brisbane SecTalks Capture the Flag event.

## Setup
There are no server side dependancies required for this, simply copy and host within a web directory.

## Solution

1. Navigate to the chatter website at http://server-ip/chatter/ and you will be greeted with a prompt to enter your name.
2. Type 'help' to view the instructions available within the bot.
3. We are lead to believe that sending the message `readFlag` should give us the flag. Attempting to do so through the text-box, you notice that the message the bot interpretted from you was 'justkidding'.
4. Looking at the HTTP request and Javascript, you will notice that Javascript manipulation is preventing you from sending `readflag` message to the back-end.
5. This can be solved using one of several ways. Open-up developer console for Google chrome or any browser that you currently use. Type a message and press `send`. Note the XHR Request being sent out to the server.
    - Right-click on the XHR request and choose `Copy` -> `Copy as cURL`. The clipboard now has the XHR request that also contains session keys for authentication. Paste this into a terminal and modify the curl request to no longer send the response `justkidding` and instead send `readflag`. The server yields the flag.
    - Alternatively, use debugging mode to edit the Javascript and remove pieces of code that modify the message being sent to server. The flag will be found in server's response, after.
6. The flag is: ```flag{7w1773r_15_my_w15d0m}```
