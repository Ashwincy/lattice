cmake_minimum_required(VERSION 2.6)
PROJECT(VERIFY)

# SET(CMAKE_CXX_FLAGS "-g -Wall") #debug
# SET(CMAKE_CXX_FLAGS "-march=opteron -mtune=opteron -O2 -pipe -fomit-frame-pointer -Wno-deprecated -Wall") #Shoup-NTL
# SET(CMAKE_CXX_FLAGS "-O2 -fpermissive -Wall") #release
SET(CMAKE_C_FLAGS "-O2 -Wall") #release

# INCLUDE_DIRECTORIES(/usr/include /usr/local/include "/Volumes/TU Darmstadt/Privat/Uni Sachen/Workspaces/MAMP/htdocs/latticechallenge_v3/verify/ntl/include")
# LINK_DIRECTORIES(/usr/lib /usr/local/lib "/Volumes/TU Darmstadt/Privat/Uni Sachen/Workspaces/MAMP/htdocs/latticechallenge_v3/verify/ntl/include")
INCLUDE_DIRECTORIES(/usr/include /usr/local/include)
LINK_DIRECTORIES(/usr/lib /usr/local/lib)

ADD_EXECUTABLE(verify verify_random.cpp)
TARGET_LINK_LIBRARIES(verify ntl gmp m)
