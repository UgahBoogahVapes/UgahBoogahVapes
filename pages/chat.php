<?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "success") {
            echo '
            <div id="success" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #0e3616; background: #73ff9d">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2em; height: 1.2em; stroke: currentColor;" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Record posted successfully.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        } else if ($_GET['status'] == "deleted") {
            echo '
            <div id="success" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #360e0e; background: #ff7373">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="width: 1.2em; height: 1.2em; stroke: currentColor;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Record deleted.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        } else if ($_GET['status'] == 'updated') {
            echo '
            <div id="success" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #0e1a36; background: #739fff">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="width: 1.2em; height: 1.2em; stroke: currentColor;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Record updated.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        }
    }
?>
<div>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <div class="container-fluid py-4 h-full">
        <div class="row" style="height: 50em;">
            <div class="col-12 h-full">
                <div class="card mb-4 h-full">
                    <div class="card-body pt-0 h-full">
                        <div id="myGrid" class="ag-theme-quartz h-full">
                            <div class="flex h-full"> 
                                <div class="w-1/4 bg-white p-4 border-r border-gray-200">
                                    <h2 class="text-xl font-semibold mb-4">Messages</h2>
                                    <!-- Search Bar -->
                                    <div class="mb-4">
                                        <div class="flex items-center border border-gray-300 rounded-lg">
                                            <input type="text" oninput="renderUserList(this.value)" placeholder="Search users..." class="flex-1 p-2 rounded-l-lg focus:outline-none focus:border-blue-400">
                                            <div class="p-2 text-gray-500 hover:text-gray-700">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="user-list-container space-y-4 mb-4"></div>
                                </div>
    
                                <div class="flex-1 flex flex-col h-full">
    
                                    <div class="flex items-center justify-between p-4 bg-white border-b border-gray-200">
                                        <h2 id="chat-header" class="text-xl font-semibold"></h2>
                                        <div class="flex space-x-4 ">
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="chat-messages" class="flex-1 overflow-y-auto p-6 space-y-4" style="background: #f2f8ff;">
                                    </div>
                                    <div class="p-4 border-t border-gray-200 bg-white">
                                        <form action="./modules/send_chat.php" method="post">
                                            <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo isset($_GET['user']) ? $_GET['user'] : "" ?>" >
                                            <div class="flex items-center">
                                                <input type="text" name="text" required autocomplete="off" placeholder="Your message" class="flex-1 p-2 border border-gray-800 rounded-lg focus:outline-none focus:border-blue-400">
                                                <button type="submit" class="ml-3 text-blue-500 hover:text-blue-700 flex items-center justify-center p-2 border border-blue-500 rounded-lg hover:bg-blue-500 hover:text-white transition-colors duration-200">
                                                    <i class="fas fa-paper-plane"></i> 
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $all_users = $crud->read_all("users");
    $chats = $crud->read_all("chat");

    $chatGroups = [];
    foreach ($all_users as $fetched_user) {
        $chat_arr = [
            "chats" => [],
            "user_id" => $fetched_user['id'],
            "type" => $fetched_user['type'],
        ];

        if ($chats) {
            foreach ($chats as $chat) {
                $receiver = $chat['receiver_id'];
                $sender = $chat['sender_id'];

                if (($receiver == $user['id'] && $sender == $fetched_user['id']) || ($sender == $user['id'] && $receiver == $fetched_user['id'])) {
                    $sender_name = $crud->read("users", (int)$chat['sender_id'])["full_name"];
                    $chat['sender_name'] = $sender_name;
                    $chat_arr["chats"][] = $chat;
                }
            }
            usort($chat_arr["chats"], fn($a, $b) => strtotime($a['datetime']) <=> strtotime($b['datetime']));
        }

        if ($user['id'] != $fetched_user['id']) {
            $chatGroups[$fetched_user['full_name']] = $chat_arr;
        }
    }

    uasort($chatGroups, function($a, $b) {
        if (empty($a['chats']) && empty($b['chats'])) return 0;
        if (empty($a['chats'])) return 1;
        if (empty($b['chats'])) return -1;
        return strtotime(end($b['chats'])['datetime']) <=> strtotime(end($a['chats'])['datetime']);
    });

    echo "<script>
        let chats = " . json_encode($chatGroups, JSON_HEX_TAG) . ";
    </script>";
?>

<script>
    console.log(chats);

    function displayChat(userName, messages) {
        var chatEl = document.getElementById("chat-messages"); 
        chatEl.scrollTop = chatEl.scrollHeight;
        const chatHeader = document.getElementById('chat-header');
        const chatMessages = document.getElementById('chat-messages');

        chatHeader.innerText = userName;
        chatMessages.innerHTML = '';

        messages.forEach(msg => {
            const messageDiv = document.createElement('div');
            const timestamp = formatDateTime(msg.datetime);

            if (<?php echo (int)$_SESSION['user_id'] ?> !== parseInt(msg.sender_id)) {
                messageDiv.className = 'flex items-start mb-4';
                messageDiv.innerHTML = `
                    <i class="fas fa-user-circle text-gray-500 text-2xl mr-3"></i>
                    <div>
                        <p class="text-gray-800 font-medium">${msg.sender_name}</p>
                        <p class="bg-blue-500 p-3 rounded-lg shadow text-white">${msg.text}</p>
                        <span class="text-xs text-gray-500">${timestamp}</span>
                    </div>
                `;
            } else {
                messageDiv.className = 'flex items-start mb-4 justify-end';
                messageDiv.innerHTML = `
                    <div class="flex justify-end w-full">
                        <div class="flex flex-col items-end">
                            <p class="bg-white p-3 rounded-lg shadow text-gray-700">${msg.text}</p>
                            <span class="text-xs text-gray-500">${timestamp}</span>
                        </div>
                    </div>
                `;
            }
            chatMessages.appendChild(messageDiv);
        });
    }

    window.onload = function() {
        const userListContainer = document.querySelector('.user-list-container');
        userListContainer.innerHTML = '';

        for (let receiver in chats) {
            const userDiv = document.createElement('div');
            userDiv.className = 'flex items-center p-2 hover:bg-gray-100 rounded-lg cursor-pointer';
            userDiv.onclick = () => {
                displayChat(receiver, chats[receiver].chats);
                document.getElementById("receiver_id").value = chats[receiver]['user_id'];
                var chatEl = document.getElementById("chat-messages"); 
                chatEl.scrollTop = chatEl.scrollHeight;
            };

            userDiv.innerHTML = `
                <i class="fas fa-user-circle text-gray-500 text-2xl mr-3"></i>
                <div class="flex-grow">
                    <p class="text-gray-800 font-medium">${receiver} (${capitalizeFirstLetter(chats[receiver]['type'])})</p>
                    <p class="text-sm text-gray-500">${truncate(chats[receiver]['chats'].length > 0 ? chats[receiver]['chats'][chats[receiver]['chats'].length-1]["text"] : "", 28)}</p>
                </div>
            `;
            userListContainer.appendChild(userDiv);
        }

        <?php if (isset($_GET['user'])): ?>
            const newReceiver = "<?php echo $crud->read("users", $_GET['user'])['full_name'] ?>";
            displayChat(newReceiver, chats[newReceiver].chats);
        <?php else: ?>
            const firstReceiver = Object.keys(chats)[0];
            displayChat(firstReceiver, chats[firstReceiver].chats);
        <?php endif; ?>
        var chatEl = document.getElementById("chat-messages"); 
        chatEl.scrollTop = chatEl.scrollHeight;
    };

    function capitalizeFirstLetter(val) {
        return String(val).charAt(0).toUpperCase() + String(val).slice(1);
    }

    function truncate(str, maxlength) {
        return (str.length > maxlength) ?
            str.slice(0, maxlength - 1) + '…' : str;
    }

    function renderUserList(searchTerm = "") {
        const userListContainer = document.querySelector('.user-list-container');
        userListContainer.innerHTML = '';

        for (let receiver in chats) {
            if (searchTerm && !receiver.toLowerCase().includes(searchTerm.toLowerCase())) {
                continue; // Skip users who do not match the search term
            }

            const userDiv = document.createElement('div');
            userDiv.className = 'flex items-center p-2 hover:bg-gray-100 rounded-lg cursor-pointer';
            userDiv.onclick = () => {
                displayChat(receiver, chats[receiver].chats);
                document.getElementById("receiver_id").value = chats[receiver]['user_id'];
            };

            userDiv.innerHTML = `
                <i class="fas fa-user-circle text-gray-500 text-2xl mr-3"></i>
                <div class="flex-grow">
                    <p class="text-gray-800 font-medium">${receiver} (${capitalizeFirstLetter(chats[receiver]['type'])})</p>
                    <p class="text-sm text-gray-500">${truncate(chats[receiver]['chats'].length > 0 ? chats[receiver]['chats'][chats[receiver]['chats'].length-1]["text"] : "", 28)}</p>
                </div>
            `;
            userListContainer.appendChild(userDiv);
        }
    }

    function formatDateTime(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const options = { hour: 'numeric', minute: 'numeric' };

        // Check if the date is today
        if (date.toDateString() === now.toDateString()) {
            return `Today at ${date.toLocaleTimeString([], options)}`;
        } else {
            // If not today, show as "Oct 28, 3:45 PM"
            options.month = 'short';
            options.day = 'numeric';
            return `${date.toLocaleDateString([], options)}`;
        }
    }

</script>

