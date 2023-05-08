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
        Load main (home) page: 5: Unauthenticated User
        Enter login details: 5: Unauthenticated User
        Press Login Button: 5: Unauthenticated User
    section Registered
        Perform site Actions:5: Authenticated User
    section Logoff
        Press Logoff Button in Navbar:5: Authenticated User
        Close Browser:5: Unauthenticated User
```
```mermaid
journey
title Contact Us
    section Contact Us
        Load Contact Us page: 5: Any User
        Enter email address : 5: Any User
        Enter message : 5: Any User
        Press Submit Button: 5: Any User
    
```
## Planning Diagram - Wireframe
<img src="images/wireframes/main-page.jpg" alt="Main Page wireframe">

## FlowChart
### User Chart
```mermaid
flowchart LR
    terminalStart([Start])
    %% Comment
    terminalEnd([End])
    thresholdSet(Register)
    setPiezoPin(Login)
    currentDistanceReading(Logout)
    activatePiezo(Manage Product)
    deactivatePiezo(Normal page)
    ifDistanceLessThanThreshold(Admin)
    
    terminalStart --> thresholdSet
    thresholdSet --> setPiezoPin
    setPiezoPin --> ifDistanceLessThanThreshold
    ifDistanceLessThanThreshold --> |True| activatePiezo
    ifDistanceLessThanThreshold --> |False| deactivatePiezo
    deactivatePiezo --> currentDistanceReading
    activatePiezo --> currentDistanceReading
    currentDistanceReading --> terminalEnd
```