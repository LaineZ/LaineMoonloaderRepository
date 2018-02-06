require("lib.moonloader")
local http = require("socket.http")
server = "127.0.0.1/LaineMoonloaderRepository-master"
packages_names = {}
function sendHttpRequestAndSave(paramtr, file)
print("http://"..server.."/"..paramtr)
local body, code = http.request("http://"..server.."/"..paramtr)
if not body then
	sampAddChatMessage("HTTP Request failed, code: "..code, 0x00ff00) 
end
local f = assert(io.open(file, 'wb')) -- open in "binary" mode
f:write(body)
f:close()
end
function sendHttpRequest(paramtr)
print("http://"..server.."/"..paramtr)
local body, code = http.request("http://"..server.."/"..paramtr)
if not body then
	sampAddChatMessage("HTTP Request failed, code: "..code, 0x00ff00) 
end
return body
end

function getLine(file)
tabls = {}
      for line in io.lines(file) do
        table.insert(tabls, line)
      end
	  return #tabls, tabls
end

function DownloadProgram(name_ver, name)
sampAddChatMessage(string.format("Downloading program/dependency: %s", name_ver), -1)
math.randomseed(os.time())
local tmpname = "moonloader/data"..math.random(0,42304923)
sendHttpRequestAndSave("data/"..name_ver.."/"..name..".info", tmpname)
local _, pack_info = getLine(tmpname)
sendHttpRequestAndSave("data/"..name_ver.."/"..pack_info[1], pack_info[4])
sampAddChatMessage("Download finished!", 0x00ff00)
end

function main()
sendHttpRequestAndSave("Packages_cl.list", "moonloader/pack.list")
numbers, packages_names = getLine('moonloader/pack.list')
while not isSampAvailable() do wait(100) end
sampAddChatMessage("LaineMoonloaderRepository", 0x00ff00)
sampAddChatMessage("(C) 2018 by Laine_prikol kotik_prikol | Client version: dev-0.1 for dev-0.1s | For {808080}Blast{4993C5}.hk", -1)
sampAddChatMessage("Total packages: "..num, 0x00ff00)
sampRegisterChatCommand("mr_install", lmr_install)
sampRegisterChatCommand("packages_list", packages_list)
	while true do
		wait(0)
    local res, btn, list = sampHasDialogRespond(178)
		if res and btn == 1 then
		math.randomseed(os.time())
		local tmpname = "moonloader/data"..math.random(0,42304923)..".info"
		local tbl_name, _ = string.match(packages_names[list + 1],"(%S*)-(%S*)")
		sendHttpRequestAndSave("data/"..packages_names[list + 1].."/"..tbl_name..".info", tmpname)
		local _, tbl1 = getLine(tmpname)
		sampShowDialog(1312, "Package info: "..tostring(tbl1[2]),"Filename: "..tostring(tbl1[1]).."\nVersion: "..tostring(tbl1[3]).."\nTo install type: /mr_install "..tostring(tbl1[2])..""..tostring(tbl1[3]), "ok", "", 0)
		end
	end
end
function packages_list(param)
sampShowDialog(178,"LaineMoonloaderRepository | Select package", table.concat(packages_names, "\n"), "Check", "Exit", 2)
end
function lmr_install(param)
local names, ver = string.match(param,"(%S*)-(%S*)")
if #param == 0 and name == nil or ver == nil then
sampAddChatMessage("{FF0000}insufficient arguments! {FFFFFF}Using: /lmr_install NAME-VERSION", -1)
else
    sampAddChatMessage("Calculating dependencies...", -1)
	tmpik_name = "moonloader/data"..math.random(0, 9230941)
	sendHttpRequestAndSave("data/"..param.."/"..names..".dep", tmpik_name)
	local dep_num, dep_names = getLine(tmpik_name)
	for i = 0, dep_num do
		if dep_names[i] ~= nil then
		local dep_name, _ = string.match(dep_names[i],"(%S*)-(%S*)")
		DownloadProgram(dep_names[i], dep_name)
		end
	end
	DownloadProgram(param, names)
	sampAddChatMessage("All downloads finished! Realoding scripts...", -1)
	file = io.open("moonloader/local_repository.data", "a")
	file:write(param.."\n")
	file:close()
	reloadScripts()
end
end