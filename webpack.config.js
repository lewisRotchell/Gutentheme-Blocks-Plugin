const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");
const fs = require("fs");

const blockPath = path.resolve(__dirname, "src", "blocks");

const createBlockEntryPoints = () => {
  const entryPoints = {};
  const blocks = fs.readdirSync(blockPath);

  blocks.forEach((block) => {
    const blockFrontendPath = path.resolve(blockPath, block, "frontend.js");

    if (fs.existsSync(blockFrontendPath)) {
      entryPoints[`blocks/${block}/frontend`] = blockFrontendPath;
    }
  });

  return entryPoints;
};

const { getWebpackEntryPoints } = require("@wordpress/scripts/utils/config");
// console.log(defaultConfig.module.rules[2])
const customConfig = {
  ...defaultConfig,
  module: {
    ...defaultConfig.module,
    rules: [
      ...defaultConfig.module.rules
    ]
  },
  entry: {
    ...getWebpackEntryPoints(),
    ...createBlockEntryPoints(),
  },
};

module.exports = customConfig;
