# CMAKE generated file: DO NOT EDIT!
# Generated by "Unix Makefiles" Generator, CMake Version 2.6

#=============================================================================
# Special targets provided by cmake.

# Disable implicit rules so canoncical targets will work.
.SUFFIXES:

# Remove some rules from gmake that .SUFFIXES does not remove.
SUFFIXES =

.SUFFIXES: .hpux_make_needs_suffix_list

# Suppress display of executed commands.
$(VERBOSE).SILENT:

# A target that is always out of date.
cmake_force:
.PHONY : cmake_force

#=============================================================================
# Set environment variables for the build.

# The shell in which to execute make rules.
SHELL = /bin/sh

# The CMake executable.
CMAKE_COMMAND = /usr/bin/cmake

# The command to remove a file.
RM = /usr/bin/cmake -E remove -f

# The program to use to edit the cache.
CMAKE_EDIT_COMMAND = /usr/bin/ccmake

# The top-level source directory on which CMake was run.
CMAKE_SOURCE_DIR = /var/www/verify

# The top-level build directory on which CMake was run.
CMAKE_BINARY_DIR = /var/www/verify

# Include any dependencies generated for this target.
include CMakeFiles/verify.dir/depend.make

# Include the progress variables for this target.
include CMakeFiles/verify.dir/progress.make

# Include the compile flags for this target's objects.
include CMakeFiles/verify.dir/flags.make

CMakeFiles/verify.dir/verify_random.cpp.o: CMakeFiles/verify.dir/flags.make
CMakeFiles/verify.dir/verify_random.cpp.o: verify_random.cpp
	$(CMAKE_COMMAND) -E cmake_progress_report /var/www/verify/CMakeFiles $(CMAKE_PROGRESS_1)
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Building CXX object CMakeFiles/verify.dir/verify_random.cpp.o"
	/usr/bin/c++   $(CXX_DEFINES) $(CXX_FLAGS) -o CMakeFiles/verify.dir/verify_random.cpp.o -c /var/www/verify/verify_random.cpp

CMakeFiles/verify.dir/verify_random.cpp.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing CXX source to CMakeFiles/verify.dir/verify_random.cpp.i"
	/usr/bin/c++  $(CXX_DEFINES) $(CXX_FLAGS) -E /var/www/verify/verify_random.cpp > CMakeFiles/verify.dir/verify_random.cpp.i

CMakeFiles/verify.dir/verify_random.cpp.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling CXX source to assembly CMakeFiles/verify.dir/verify_random.cpp.s"
	/usr/bin/c++  $(CXX_DEFINES) $(CXX_FLAGS) -S /var/www/verify/verify_random.cpp -o CMakeFiles/verify.dir/verify_random.cpp.s

CMakeFiles/verify.dir/verify_random.cpp.o.requires:
.PHONY : CMakeFiles/verify.dir/verify_random.cpp.o.requires

CMakeFiles/verify.dir/verify_random.cpp.o.provides: CMakeFiles/verify.dir/verify_random.cpp.o.requires
	$(MAKE) -f CMakeFiles/verify.dir/build.make CMakeFiles/verify.dir/verify_random.cpp.o.provides.build
.PHONY : CMakeFiles/verify.dir/verify_random.cpp.o.provides

CMakeFiles/verify.dir/verify_random.cpp.o.provides.build: CMakeFiles/verify.dir/verify_random.cpp.o
.PHONY : CMakeFiles/verify.dir/verify_random.cpp.o.provides.build

# Object files for target verify
verify_OBJECTS = \
"CMakeFiles/verify.dir/verify_random.cpp.o"

# External object files for target verify
verify_EXTERNAL_OBJECTS =

verify: CMakeFiles/verify.dir/verify_random.cpp.o
verify: CMakeFiles/verify.dir/build.make
verify: CMakeFiles/verify.dir/link.txt
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --red --bold "Linking CXX executable verify"
	$(CMAKE_COMMAND) -E cmake_link_script CMakeFiles/verify.dir/link.txt --verbose=$(VERBOSE)

# Rule to build all files generated by this target.
CMakeFiles/verify.dir/build: verify
.PHONY : CMakeFiles/verify.dir/build

CMakeFiles/verify.dir/requires: CMakeFiles/verify.dir/verify_random.cpp.o.requires
.PHONY : CMakeFiles/verify.dir/requires

CMakeFiles/verify.dir/clean:
	$(CMAKE_COMMAND) -P CMakeFiles/verify.dir/cmake_clean.cmake
.PHONY : CMakeFiles/verify.dir/clean

CMakeFiles/verify.dir/depend:
	cd /var/www/verify && $(CMAKE_COMMAND) -E cmake_depends "Unix Makefiles" /var/www/verify /var/www/verify /var/www/verify /var/www/verify /var/www/verify/CMakeFiles/verify.dir/DependInfo.cmake --color=$(COLOR)
.PHONY : CMakeFiles/verify.dir/depend

