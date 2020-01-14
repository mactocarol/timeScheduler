<?php

class ResponseMessages{

    public static function getStatusCodeMessage($status)
    {

        $codes = Array(
            100 => "Invalid API key",
            101 => "Invalid Auth Token",
            102 => "Invalid username",
            103 => "Invalid Input Parameters",
            104 => "An Error Occurred in User Registration",
            105 => "Invalid email/password",
            106 => "User logged in successfully.",
            107 => "User not found",
            108 => "Profile updated successfully.",
            109 => "An error occurred please try again.",
            110 => "User registered successfully.",
            112 => "Please select image.",
            113 => "Please select video.",
            114 => "No results found.",
            115 => "You are temporarily blocked.",
            116 => "User already exist.",
            117 => "Email already exist.",
            118 => "Something went wrong",
            119 => "All fields are required",
            120 => "Please check your mail to reset your password.",
            121 => "Your account has been blocked by admin.", 
            122 => "Contact number already exist.",
            123 => "You have already join",
            124 => "Please check your mail to recieve your varification code.",
            125 => "User Id is required",
            126 => "successfully added",
            127 => "Already exist",
            128 => "Please verify your email address to get password.",
            129 => "Status updated successfully",
            130 => "Delete successfully",
            131 => "Request delete successfully",
            132 => "Request accept successfully",
            133 => "Request send successfully",
            134 => "Not registered",
            135 => "User registered",
            136 => "Request cancel successfully",
            137=>  "Logged out successfully.",
            138=>  "Image uploaded successfully.",
            138=>  "Profile not updated.",
            139=>  "Registration Successfull.",
            140=>  "Password changed successfully.",
            141=>  "Old password do not match.",
            142 => "Please check your mail to reset your password",
            143 => "Invalid email id",
            144 => "Sorry! profile update failed.",
            145 => "Password reset successfully.",
            146 => "Cannt set password please gentrate new link.",
            147 => "Sorry we are unable to complete your request right Now.",
            148 => "Password changed successfully.",
            149 => "Password not changed.",
            150 => "Old password does not match.",
            151 => "Post successfully added.",
            152 => "Post can't be posted right now.",
            153 => "Updated successfully.",
            154 => "Sorry can't update.",
            155 => "Data Inserted Successfully.",
            156 => "Data not inserted.",
            157 => "Your selected data.",
            158 => "No data found.",
            159 => "Tags selected.",
            160 => "Image can't be added right now.",
            161 => "Selected categories.",
            162 => "Please select image.",
            163 => "Sorry can't accept your request.",
            164 => "Data for transfer inventory.",
            165 => "Selected data for post.",
            166 => "your like is visible for all.",
            167 => "Unliked.",
            168 => "No Data Found.",
            169 => "Data Found.",
            170 => "Sorry ! can't like.",
            171 => "Cannt add cost.",
            173 => "your comment is visible for all.",
            174 => "Location added successfully.",
            175 => "Supplier not found,cannt update.",
            176 => "Salesman added successfully.",
            177 => "Salesman not found,cannt update.",
            178 => "Invalid company id.",
            179 => "Something Went Wrong.",
            180 => "Invalid inventory Id.",
            181 => "Email already exist.",
            182 => "Expenses added successfully.",
            183 => "Group created successfully.",
            184 => "Can't creat group.",
            185 => "No data found with your search parameters.",
            186 => "User already login.",
            187 => "You are already a member of this group.",
            188 => "You have already made the group with this name.",
            189 => "Sorry can't add income & expenses.",
            190 => "Income and expenses selected.",
            191 => "Client added successfully.",
            192 => "Client not added.",
            193 => "Business updated successfully.",
            194 => "Client updated successfully.",
            195 => "Tax added successfully.",
            196 => "Business has been already Added by you.",
            197 => "Payment method added successfully.",
            198 => "Business is currently inactive by admin.",
            199 => "User added successfully,user id and password has been sent to user email id.",
            506 => "User added but can't sent email to user for user id and password.",
            507 => "User not added.",
            508 => "Request can't be completed right now.",
            509 => "You are not permitted to add location.",
            510 => "You did't add any sub user.",
            511 => "User not found.",
            512 => "User permission updated successfully.",
            513 => "Inventory added Successfully.",
            514 => "Supplier not found.",
            515 => "Transfer inventory added successfully.",
            516 => "Quantity is not available for all products.",
            517 => "Supplier is currently inactive by admin.",
            518 => "This inventory has been already transferd.",
            519 => "Selected data for groups.",
            520 => "Selected data of group members.",
            521 => "Selected data of notification.",
            522 => "Deleted group successfully.",
            523 => "Group updated successfully.",
            524 => "Group not updated.",
            525 => "Type is required.",
            526 => "No notification.",
            527 => "This post does not exist",
            528 => "This group does not exist",
          529 => "Card Details Inserted Successfully",
        530 => "Card Details Not Inserted",            


            700 => "Request List",
            701 => "Request Accepted Successfully.",
            702 => "Order Picked Successfully.",
            703 => "Order Delivered Successfully.",
            704 => "You Accept Only 5 Request For One Day.",
            705 => "Review and Rating Send Successfully.",
            706 => "You Already Sent Review For This Order.",
            707 => "Coupan Code Apply Successfully.",
            708 => "Coupan Code Already Apply.",
            709 => "Coupan Code Invalid.",
            710 => "Successfully status changed.",
            711=>  "New password send your email id",
            712 => "Order booked successfully.",
            713 => "Invalid Card Details.",
            714 => "Order booked Transaction Failed.",
            715 => "Signature upload successfully.",
            716 => "Signature not upload.",       
            
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Data Found',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            501 => 'Successfully'
        );

        
        
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}

?>
