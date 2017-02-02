# Firebase-Push-Notification
Firebase Push Notification by Native Android
Firebase Cloud Messaging Quickstart

The Firebase Cloud Messaging Android Quickstart app demonstrates registering an Android app for notifications and handling the receipt of a message. InstanceID allows easy registration while FirebaseMessagingService and FirebaseInstanceIDService enable token refreshes and message handling on the client.

Introduction

Read more about Firebase Cloud Messaging
Getting Started

Add Firebase to your Android Project.
Run the sample on Android device or emulator.
Sending Notifications

Use Firebase console to send FCM messages to device or emulator.

Send to a single device

From Firebase console Notification section, click New Message.
Enter the text of your message in the Message Text field.
Set the target to Single Device.
Check the logs for the InstanceID token, copy and paste it into the Firebase console Token field.
If you cannot find the token in your logs, click on the LOG TOKEN button in the application and the token will be logged in logcat.
Click on the Send Message button.
If your application is in the foreground you should see the incoming message printed in the logs. If it is in the background, a system notification should be displayed. When the notification is tapped, the application should return to the quickstart application.
