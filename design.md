# Project Overview

My php site will be selling Maccas toys that look like Maccas foods, Chip, Big Mac McFlurrys. all foods into little foods

## User Management
Users will be able to login and out

Users info will be stored
- Name
- DOB
- Email
- Address
- hashed password
- access level (admin or normal user)

## Product Management
People with the right permission will be able to add, remove and edit Products

Product info will be stored
- Name
- Price
- Description
- Quantity (stock)

## Behaviour User Journey 
```mermaid
journey
title Login / Log off
    section Login
        Load main (home) page: 3: Unauthenticated User
        Enter login details: 3: Unauthenticated User
        Press Login Button: 3: Unauthenticated User
    section Registered
        Perform site Actions: 3: Authenticated User
    section Logoff
        Press Logoff Button in Navbar: 3: Authenticated User
        Close Browser: 3: Unauthenticated User
```
## Planning Diagram - Wireframe
https://docs.google.com/drawings/d/1DOEwe4YX8LpipM98CNDopNdx__X4pk5ya1yDTpoJUWs/edit?usp=sharing