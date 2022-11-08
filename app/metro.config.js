const { getDefaultConfig } = require("@expo/metro-config");
const defaultConfig = getDefaultConfig(__dirname);

/**
 * replacing code to fix nw version v9.6.1
 */
defaultConfig.resolver.assetExts.push("cjs");
module.exports = defaultConfig;
