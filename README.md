# Infoeducatia
Kotys is  device management and tracking tool, similar to a Remote Access Tool.
This tool was presented at Infoeducatia Contest


Kotys is  a complete solution for device management

It has the following components:

-Kotys Core C# - Windows APP  - installed on a local machine receive commands from Kotys PHP panel and returns information about the machine
-Kotys Android - written in XAMARIN - send gps data to PHP panel - good for tracking employee devices
-Kotys PHP panel - the admin panel with the device management and administration

*-Kotys Helper -  a tool written in C# that is watching over the main process and is keeping it alive (it can be opened multiple times for more relays => faster check)
