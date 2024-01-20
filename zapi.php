
<?php


// *****************************************************************************************************8

{{baseUrl_cq}}sign-up

phone:1234867783
name:test
email:patient11143@cloudequeue.com
password:12345678
//Password_confirmation:12345678
type:patient
gender:male
alternative_mobile_no:2134567890
dob:2023-12-12
allergy_medicine:yes
description:ssssssssssssssssssssssssssss
time:10:10:12
long:12.345678
lat:-34.123456
blood_group:o
address:kolkata

{
    "status": true,
    "response_code": 201,
    "message": "Registration Successfully",
    "data": {
        "allergy_medicine": "yes",
        "description": "ssssssssssssssssssssssssssss",
        "time": "10:10:12",
        "long": "12.345678",
        "lat": "-34.123456",
        "blood_group": "o",
        "address": "kolkata",
        "type": "patient",
        "dob": "2023-12-12",
        "user_id": 24,
        "uuid": "fd19cb11-5559-45bf-ae6b-33a27c050f57",
        "updated_at": "2023-12-21T10:20:09.000000Z",
        "created_at": "2023-12-21T10:20:09.000000Z",
        "id": 7
    }
}

// *****************************************************************************************************

{{baseUrl_cq}}sign-up

phone:1234567800
name:test
email:clinic1@cloudequeue.com
password:12345678
type:clinic
alternative_mobile_no:2134567890
clinic_name:ABCD Clinic
description:aaaaaaaaaaaaaaaaaaaaa
long:21.12345
lat:-98.98765
address:xdfghjk
time:10:10:10
gender:male

{
    "status": true,
    "response_code": 201,
    "message": "Registration Successfully",
    "data": {
        "clinic_name": "ABCD Clinic",
        "description": "aaaaaaaaaaaaaaaaaaaaa",
        "long": "21.12345",
        "lat": "-98.98765",
        "address": "xdfghjk",
        "time": "10:10:10",
        "type": "clinic",
        "user_id": 25,
        "uuid": "b9793fea-f23b-4956-887e-932830a802a7",
        "updated_at": "2023-12-21T10:24:38.000000Z",
        "created_at": "2023-12-21T10:24:38.000000Z",
        "id": 2
    }
}
// *****************************************************************************************************
{{baseUrl_cq}}sign-up

phone:1034567888
name:test
email:doctor110921@abc.com
password:12345678
//Password_confirmation:12345678
type:doctor
gender:male
alternative_mobile_no:2134567890
qualifaction:mbbs
registration_date:2023-12-20
registration_number:1234567654
experience:70
consultation_fee:yes
price:10000

{
    "status": true,
    "response_code": 201,
    "message": "Registration Successfully",
    "data": {
        "user_id": 26,
        "type": "doctor",
        "qualifaction": "mbbs",
        "registration_date": "2023-12-20",
        "registration_number": "1234567654",
        "experience": "70",
        "consultation_fee": "yes",
        "price": "10000",
        "uuid": "a05804d7-38b6-42ba-a745-8e33ab2d7c3a",
        "updated_at": "2023-12-21T10:25:12.000000Z",
        "created_at": "2023-12-21T10:25:12.000000Z",
        "id": 3
    }
}

// *****************************************************************************************************
// generate-otp /re-send otp
{{baseUrl_cq}}generate-otp
{
    "phone":1034567888
}
{
    "status": true,
    "response_code": 201,
    "message": "Otp Genaret Successfully",
    "data": {
        "id": 26,
        "uuid": "dc6d7d09-d76e-4be6-a184-650890f47564",
        "parent_id": null,
        "name": "test",
        "email": "doctor110921@abc.com",
        "email_verified_at": null,
        "mobile_number": 1034567888,
        "verification_code": 9064,
        "mobile_number_verified_at": null,
        "alternative_mobile_no": 2134567890,
        "gender": "male",
        "type": "doctor",
        "is_active": 1,
        "profile_images": null,
        "created_at": "2023-12-21T10:25:12.000000Z",
        "updated_at": "2023-12-21T10:27:38.000000Z",
        "deleted_at": null
    }
}
// *****************************************************************************************************
{{baseUrl_cq}}login-phone-number
{
    "phone": 1034567888,
    "otp": 9064
}
{
    "status": true,
    "response_code": 200,
    "message": "User Login Successfully ",
    "data": {
        "mobile_number": 1034567888,
        "verification_code": 9064,
        "accessToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMWEzY2JhYzQ5YTk1NGVhZmY4NTY2NmVlZTg3ZGYxMjNmNDcwMThmMWI4M2JmODVkMmZiNjNmOTFkNjQ1ZWM3YWFlYWJiNDFjZTkzMGY3ZGIiLCJpYXQiOjE3MDMxNTQ1NjAuODgwODksIm5iZiI6MTcwMzE1NDU2MC44ODA4OTIsImV4cCI6MTczNDc3Njk2MC44NzM1NDEsInN1YiI6IjI2Iiwic2NvcGVzIjpbXX0.Dr37bTD_yRpW691qEURYTK6i0pGPeu3FRmz4Z0UbIjdGbANEiulCPcASSEo-jGskgqiX3P8eLZUm_MaBqcfchLwKuVHcAzYBsKMApN2uBAwPeJfDvk2MzmhEGtijel8uqSKnKHDfpkNUgmzquXrPH3ZyOVnJEvupdja7pKVcd46meFVHNDq3HowLC-O9DVIzsTH-AMg_N8oc7QDW-ra9WSYQ4iHuWjcavuGq3WFeqZm8dvOSuZWD2Ls3FAeZeHe-o2P6LuozhncMaDRGmuK07WZcSwd3SncvFuuVHo4tfMqmNXQTevhtOBDKqOfyNMNCeXX-L3RZn6iRvJQFvSa4V_QveEbvM9a6cqNXAYNaLT0-v0VavgnFCHHnyuHFZHYPJCDMiGOyOe3OjqlpnYBWOFayyk54xVLMVcBuiE8-XyB7emMly5Xp3FXUyc7GaRIUOLBKdyvyf8ZG5tYAE8IZiS77_LYoqYxEQ1oitkkY2v0zttIpGbVzqiDjP9j28bCzqdh9NZOaVm5Aa1mXl4sCPNLAh_KWRG6HCd_GXYKzCfyXdjQGdKooCyxn42v-PNUmd7a5ceT8DcvNkuEbEqDF1X4vo8sYFDN_BZEcH9esAZ2g67cCLYizVFyQksVKULrXVYTgyJM_OlfqRV1CvSoFE59b7-ndk7DVsPnWImBQPp0",
        "user": {
            "id": 26,
            "uuid": "dc6d7d09-d76e-4be6-a184-650890f47564",
            "parent_id": null,
            "name": "test",
            "email": "doctor110921@abc.com",
            "email_verified_at": null,
            "mobile_number": 1034567888,
            "verification_code": null,
            "mobile_number_verified_at": null,
            "alternative_mobile_no": 2134567890,
            "gender": "male",
            "type": "doctor",
            "is_active": 1,
            "profile_images": null,
            "created_at": "2023-12-21T10:25:12.000000Z",
            "updated_at": "2023-12-21T10:29:20.000000Z",
            "deleted_at": null
        }
    }
}
// *****************************************************************************************************
{{baseUrl_cq}}login-email-password
{
    "email": "patient111431@cloudequeue.com",
    "password": 12345678
}
{
    "status": true,
    "response_code": 200,
    "message": "User Login Successfully ",
    "data": {
        "email": "patient111431@cloudequeue.com",
        "password": "12345678",
        "accessToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGNkMDdiOTIyYTU2YzI2MGU2NzU5YWE3NDUyYzY2ZGFjNDhmYmM4ODE0YzMwYzIwNjA2YjQyZDY3NjYxNmNmOTY3NTA3ZmVkNjY5YTE3NDQiLCJpYXQiOjE3MDMxNDE1MzIuNDgxMTYxLCJuYmYiOjE3MDMxNDE1MzIuNDgxMTY0LCJleHAiOjE3MzQ3NjM5MzIuNDcxNTg4LCJzdWIiOiIyMiIsInNjb3BlcyI6W119.JFtK2IiM7aDPP5UlvUbE-vDzcoiWQ_Js-6E4n6Cy0dXDXPwp0n2SWAaaQP-VYxizHRPpSwXVP_gUO3kQDS71Rn9DNtMLOZzbzWMNv9SnWdC5IhOlougJGVKZnvra20qX0aX4cIIletMfgIMoZarCnTIKlgXloP3Jt4_ni6MUqnXLr93EO1Kyi1X9YHdeRGghX47Rvz_NZgiJBXz_-nEgTaaE3mzTarFeBLTAfcTUpeDp6ot-d3JyMSeQ1Ph4DaLD0ecYhTOrm4hNliL6bql3zUjdyPrS9e-Wroi1dm4LWPbpn5DyqU_0TXr-SaZ5KjH_Btt-dyQjz1WqZENudGWRj7gSECNVeyXiC8aCFrFuQ_RDCtIZcbeG6X26vCm3vrSxa-Nf8772FDIPZBR15SDgnWZW94lh7-rxDQ89UeTOrB0bOTH6zIvFhbPlmEagjIt7zHC0MdhllI7cuiAMoDRw1Suup0jW88wSLauSbSTzautWG3xrYM4lzpJ7CBBFKaBIUweSrG1FcSe52dcYEwHk6Yk1YDSgkBQXdb5BbePfzGNesFTWDfoEyLoj9E3hxLH8stX00_B-xg7W2knD4judPe6xsvciQmnZ2Ow2Q25R4LenOefbrdDZtHyudB0DLlYJ2YthcURdbttDge9W5cZwvtkHwP4dJk9BTnUgnDEk9JE",
        "user": {
            "id": 22,
            "uuid": "5c46c56c-8f16-44bf-bb09-002232a9c90f",
            "parent_id": 21,
            "name": "test",
            "email": "patient111431@cloudequeue.com",
            "email_verified_at": null,
            "mobile_number": 1234867781,
            "verification_code": null,
            "mobile_number_verified_at": null,
            "alternative_mobile_no": 2134567890,
            "gender": "male",
            "type": "patient",
            "is_active": 1,
            "profile_images": null,
            "created_at": "2023-12-21T06:38:35.000000Z",
            "updated_at": "2023-12-21T06:38:35.000000Z",
            "deleted_at": null
        }
    }
}
// *****************************************************************************************************
{{baseUrl_cq}}auth/logout

{
    "status": true,
    "response_code": 200,
    "message": "You Have been Successfully Logged Out!",
    "data": []
}
// *****************************************************************************************************
{{baseUrl_cq}}patient/add-family-member

phone:1234867781
name:test
email:patient111431@cloudequeue.com
password:12345678
//Password_confirmation:12345678
type:patient
gender:male
alternative_mobile_no:2134567890
dob:2023-12-12
allergy_medicine:yes
description:ssssssssssssssssssssssssssss
time:10:10:12
long:12.345678
lat:-34.123456
blood_group:o
address:kolkata
user_id:21

{
    "status": true,
    "response_code": 201,
    "message": "Your Family Member Registration  Successfully",
    "data": {
        "id": 8,
        "uuid": "85294b1c-6717-4246-9e2f-54a38dc0929c",
        "name": null,
        "parent_id": null,
        "email": null,
        "mobile_number": null,
        "alternative_mobile_no": null,
        "gender": null,
        "type": "patient",
        "profile_images": null,
        "is_active": null,
        "profile": null
    }
}

// *****************************************************************************************************
patient/show-profile
{
"user_id":22
}{
"status": true,
"response_code": 201,
"message": "Your Family Member Registration Successfully",
"data": [
{
"id": 22,
"uuid": "5c46c56c-8f16-44bf-bb09-002232a9c90f",
"name": "test",
"parent_id": 21,
"email": "patient111431@cloudequeue.com",
"mobile_number": 1234867781,
"alternative_mobile_no": 2134567890,
"gender": "male",
"type": "patient",
"profile_images": null,
"is_active": 1,
"profile": {
"id": 5,
"uuid": "7ee17394-d68c-46bc-afe7-45692c09df40",
"dob": "2023-12-12",
"address": "kolkata",
"blood_group": "o",
"lat": "-34.123456",
"long": "12.345678",
"time": "10:10:12"
}
}
]
}
// *****************************************************************************************************
{{baseUrl_cq}}forgot-password
{
    "user_id":21,
    "password":12345678,
    "password_confirmation":12345678
}
{
    "status": true,
    "response_code": 200,
    "message": "Your Password Update Successfully ",
    "data": []
}
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
// *****************************************************************************************************
