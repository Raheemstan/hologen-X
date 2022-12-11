# Hologen-X ###

Halogen Hackathon solution
- Reverse OTP for Multi-Factor Authentication using twillio messaging.

## /api/message

initial request from base application

#### Request

* phone - user's phone number
* api_key - application api key

#### Response

* status - response status
* message - response message
* otp - auto generated otp
* phone - twillio phone number

## /api/sms

#### Request

* Body - message body from twillio
* From - phone number of user

#### Response

* status - response status
* message - response message
