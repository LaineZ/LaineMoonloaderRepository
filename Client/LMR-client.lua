require("lib.moonloader")
local http = require("socket.http")
server = "185.40.31.127/LaineMoonloaderRepository"
packages_names = {}
updates = {}
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
function CheckVer(versus)
	if versus == nil then
		versus = 1
	end
end
function main()
while not isSampAvailable() do wait(100) end
sendHttpRequestAndSave("Packages_cl.list", "moonloader/pack.list")
numbers, packages_names = getLine('moonloader/pack.list')
if io.open("moonloader/local_repository.data", "r") ~= nil then
	local _, package_names = getLine('moonloader/pack.list')
	local _, package_names_l = getLine('moonloader/local_repository.data')
	sampAddChatMessage("Checking for package updates!", 0x00ff00)
	for i = 1, #package_names_l do
		if package_names[i] ~= nil and package_names_l[i] ~= nil then
			package_names[i] = string.gsub(package_names[i], " ", "_")
			sampAddChatMessage("Checking update for package: "..tostring(package_names[i]).." and compare local: "..tostring(package_names_l[i]), -1)
			local _, name =  string.match(package_names[i], "(%S*)-(%S*)")
			local _, name_l =  string.match(package_names_l[i], "(%S*)-(%S*)")
			local ver1, ver2, ver3 = string.match(name, "(%d+)%.(%d+)%.(%d+)")
			local ver1_l, ver2_l, ver3_l = string.match(name_l, "(%d+)%.(%d+)%.(%d+)")
			 ver1, ver2, ver3 = ver1 or 0, ver2 or 0, ver3 or 0
			 ver1_l, ver2_l, ver3_l = ver1_l or 0, ver2_l or 0, ver3_l or 0
					if name == name_l and ver1 > ver1_l or ver2 > ver2_l or ver3 > ver3_l then
					sampAddChatMessage("Update for package: "..package_names[i].." Local version: "..package_names_l[i], -1)
					else
					print("No updates available for package: ", package_names[i], package_names_l)
					end
		sampAddChatMessage("Update checking: ok", 0x00ff00)
		end
	end
end
sampAddChatMessage("LaineMoonloaderRepository - Please report bugs on GitHub or Blast.hk thread", 0x00ff00)
sampAddChatMessage("THIS IS ALPHA VERSION: It still has some incomplete features and bugs. At some point – sooner or later – it will probably break!", 0xffff00)
sampAddChatMessage("(C) 2018 by Laine_prikol kotik_prikol | Client version: dev-0.3.1 for 0.0.5s | For {808080}Blast{4993C5}.hk", -1)
sampAddChatMessage("Total packages: "..tostring(num), 0x00ff00)
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
		if dep_name == nil then
			sampAddChatMessage("Error while downloading dependencies: invalid format", 0xff0000)
			else
			DownloadProgram(dep_names[i], dep_name)
			end
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