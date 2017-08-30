script_name("LainePackageManager")
script_author("")
downloading = 0

local dlstatus = require('moonloader').download_status
local vk = require 'vkeys'
local server = "http://syperdompic.000webhostapp.com/"
function download_handler(id, status, p1, p2)
  if stop_downloading then
    stop_downloading = false
    download_id = nil
    sampAddChatMessage('Загрузка отменена.', -1)
    return false -- прервать загрузку
  end
  if status == dlstatus.STATUS_DOWNLOADINGDATA then
    sampAddChatMessage(string.format('Download %d of %d.', p1, p2), -1)
  elseif status == dlstatus.STATUS_ENDDOWNLOADDATA then
    sampAddChatMessage('Download/Fetch complete!', -1)
	
  end
end
 
function main()
  while not isSampAvailable() do wait(1000) end
  sampRegisterChatCommand("lmr_install", downloadcmd)
  os.remove('moonloader/repository/Repository_programs.list')
  sampAddChatMessage('LainePackageManager fetching packages...', -1)
  local packages_url = server..'/files/Repository_programs.list'
  local packages_path = getWorkingDirectory() .. 'repository/Repository_programs.txt'
  download_id = downloadUrlToFile(packages_url, packages_path, download_handler)
    file = io.open("moonloader/repository/Repository_programs.txt", "r")
    if file == nil then
      sampAddChatMessage("Can't fetch packages!", 0xff00ff)
      io.open("moonloader/repository/Repository_programs.txt", "w"):close()
    end
    if file ~= nil then
      mess = file:read("*a")
      tabls = {}
      for line in io.lines('moonloader/repository/Repository_programs.txt') do
        tabls[#tabls + 1] = line
      end
      io.close(file)
      sampAddChatMessage("Packages in repository: "..#tabls, 0x00ff00)
    end
  while true do
    wait(2500)
	if downloading == 4 then
	sampAddChatMessage("Reloading scripts, please wait!", -1)
	reloadScripts()
	end
  end
end
function downloadcmd(param)
	if #param == 0 then
	sampAddChatMessage("Use: /lmr_install <packageVersion> (Case sensitive)")
	else
    local url = server..'/files/'..param..'.lua'
	local url_config = server..'/files/'..param..'_config.lua'
	local url_desc = server..'/files/'..param..'_description.desc'
    local file_path = getWorkingDirectory() .. '/'..param..'.lua'
	local file_config = getWorkingDirectory() .. '/'..param..'_config.lua'
	local file_desc = getWorkingDirectory() .. '/'..param..'_description.desc'
	download = download + 1
    download_id = downloadUrlToFile(url, file_path, download_handler)
	download = download + 1
	download_id = downloadUrlToFile(url_config, file_config, download_handler)
	download = download + 1
	download_id = downloadUrlToFile(url_desc, file_desc, download_handler)
	download = download + 1
    sampAddChatMessage('Connecting to repository...', -1)	
	end
end
